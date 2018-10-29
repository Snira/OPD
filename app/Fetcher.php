<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpseclib\Net\SSH2;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

class Fetcher extends Model
{
    protected $ssh;
    protected $dataSet;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->ssh = new SSH2('10.11.10.141');
        if (!$this->ssh->login('root', 'pos4-boy')) {
            exit('Login Failed');
        }
    }

    public function serverData()
    {
        return $this->ssh->exec('uname -n');
    }

    public function websiteCollection()
    {
        $websiteList = collect();
        $websites = explode("  ", $this->ssh->exec('cd /var/www/html; dir'));
        //Returns an array with all the website domain names

        foreach ($websites as $website) {
            $websiteObject = new Fluent([$website, 'framework' => $this->websiteInstance($website)]);
            $websiteList->push($websiteObject);
            //Adds Laravel version to according website
        }


        dd($websiteList);
        return $websiteList;
    }

    public function websiteInstance($website)
    {
        $data = $this->ssh->exec("cd /var/www/html/'$website'; php artisan --version;");
        if ($this->ssh->getExitStatus()) {
            return 'Geen framework versie beschikbaar';
        }
        return $data;
    }

    public function setData()
    {
        $dataSet = new Fluent(['server' => $this->serverData(), 'websites' => $this->websiteCollection()]);
        return $dataSet;
    }


}

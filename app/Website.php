<?php

namespace App;

use phpseclib\Net\SSH2;
use Illuminate\Support\Fluent;

class Website extends Connection
{
    //Returns collection of websites
    public function getWebsiteCollection()
    {
        $websiteList = collect();
        $websites = explode("  ", $this->ssh->exec('cd /var/www/html; dir'));
        //Returns an array with all the website domain names

        foreach ($websites as $website) {
            $websiteObject = $this->getWebsiteInstance($website);
            $websiteList->push($websiteObject);

        }

        return $websiteList;
    }

    //Returns website object
    public function getWebsiteInstance($website)
    {
        $websiteObject = new Fluent([
            'name' => $website,
            'framework' => $this->getlaravelVersion($website)
        ]);

        return $websiteObject;
    }

    //Adds Laravel version to according websiteObject
    public function getlaravelVersion($website)
    {
        $data = $this->ssh->exec("cd /var/www/html/'$website'; php artisan --version;");
        if ($this->ssh->getExitStatus()) {
            return 'Geen framework versie beschikbaar';
        }
        return $data;
    }
}

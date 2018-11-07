<?php

namespace App;

use Illuminate\Support\Facades\URL;
use phpseclib\Net\SSH2;
use Illuminate\Support\Fluent;

class Website
{
    private $ssh;
    private $directory;

    public function __construct(SSH2 $ssh, string $directory)
    {
        $this->ssh = $ssh;
        $this->directory = $directory;
    }

    private function run(string $command)
    {
        return $this->ssh->exec("cd /var/www/vhosts/'$this->directory';" . $command);
    }


    /**
     * Returns website object instance
     * @return Fluent
     */
    public function getWebsiteInstance(): Fluent
    {
        $websiteObject = new Fluent([
            'name' => $this->directory,
            'framework' => $this->getFrameworkVersion(),
//            'plugins' => $this->getPlugins()
        ]);

        return $websiteObject;
    }

    //Adds Laravel version to according websiteObject
    public function getFrameworkVersion(): string
    {
        $data = $this->run("php artisan --version");
        if ($this->ssh->getExitStatus()) {
            return 'Geen framework versie beschikbaar';
        }
        return $data;
    }

    public function getPlugins()
    {
        $data = explode("\n", $this->run("composer show"));

        return $data;
    }


}

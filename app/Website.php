<?php

namespace App;

use phpseclib\Net\SSH2;


class Website
{
    private $ssh;
    public $directory;

    public function __construct(SSH2 $ssh, string $directory)
    {
        $this->ssh = $ssh;
        $this->directory = $directory;
    }

    private function run(string $command)
    {
        return $this->ssh->exec("cd /var/www/vhosts/'$this->directory';" . $command);
    }

    //Adds Laravel version to according websiteObject
    public function frameworkVersion()
    {
        $data = $this->run("php artisan --version");
        if ($this->ssh->getExitStatus()) {
            return 'Geen framework versie beschikbaar';
        }
        return $data;
    }

    public function plugins()
    {
        $data = explode("\n", $this->run("composer show"));

        return $data;
    }


}

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

    /**
     * Returns output of an SSH command
     * @param string $command
     * @return mixed
     */
    private function run(string $command)
    {
        return $this->ssh->exec("cd /var/www/vhosts/'$this->directory';" . $command);
    }

    /** Returns Laravel version of website instance */
    public function frameworkVersion()
    {
        $data = $this->run("php artisan --version");
        if ($this->ssh->getExitStatus()) {
            return 'Geen framework versie beschikbaar';
        }
        return $data;
    }

    /**
     *  Returns all used php plugins of website instance
     *
     * @return array
     */
    public function plugins()
    {
        $data = explode("\n", $this->run("composer show"));

        return $data;
    }

//    public function mbString()
//    {
//        foreach ($this->plugins() as $plugin) {
//            if (substr($plugin, 0, 25) === "symfony/polyfill-mbstring") {
//                return $plugin;
//            }
//        }
//    }


}

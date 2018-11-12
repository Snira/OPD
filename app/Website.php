<?php

namespace App;

use phpDocumentor\Reflection\Types\Boolean;
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

    /** Returns Framework version of website instance */
    public function frameworkVersion()
    {
        $commands = collect(["php artisan --version", "drush status"]);
        foreach ($commands as $command) {
            $data = $this->run($command);
            if (!$this->ssh->getExitStatus()) {
                return $data;
            } elseif ($this->isSubDomain()) {
                return 'Dit is een subdomein';
            } else {
                return 'Geen bekend framework';
            }
        }
    }

    /**
     *  Returns all used php plugins of website instance
     *
     * @return array
     */
    public function plugins()
    {
        return explode("\n", $this->run("composer show"));

    }

    /**
     * Checks if directory is subdomain
     *
     * @return string
     */
    public function isSubDomain()
    {
        $this->run('cd bin;');
        if (!$this->ssh->getExitStatus()) {
            return true;
        }
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

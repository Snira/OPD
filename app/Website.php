<?php

namespace App;

use phpDocumentor\Reflection\Types\Boolean;
use phpseclib\Net\SSH2;


class Website
{
    private $ssh;
    public $directory;
    public $framework;

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

    public function name()
    {
        $arr = explode("/", $this->directory, 2);
        if (empty($arr[1])) {
            return $this->directory;
        } else {
            return $arr[1];
        }

    }

    /** Returns Framework version of website instance */
    public function frameworkVersion()
    {
        $data = $this->laravel();
        if (!$data) {
            $data = $this->drupal();
        }
        return $data;
    }


    public function laravel()
    {
        $data = $this->run("php artisan --version");
        if (!$this->ssh->getExitStatus()) {
            $this->framework = 'Laravel';
            return substr($data, -7);
        }
        return null;
    }

    public function drupal()
    {
        $data = (string)$this->run("drush version");
        if (!$this->ssh->getExitStatus()) {
            $this->framework = 'Drupal';
            $parse = substr($data, -8);
            $parse2 = substr($parse, 0, 5);

            return $parse2;
        }
        return null;
    }

    /**
     *  Returns all used php plugins of website instance
     *
     * @return array
     */
    public function plugins()
    {
        $data = explode("\n", $this->run("composer show"));
        if (substr($data[0], 0, 7) == 'Warning') {
            $data = ['Er is een fout bij het ophalen van plugins', 'De server geeft het volgende terug: ', $data[0]];
        };
        $data2 = paginateCollection($data, 5);
        return $data2;
    }

    public function phpVersion()
    {
        $data = $this->run('php -v');
        return substr($data,3,4);
    }




}

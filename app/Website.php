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
        $commands = collect(["php artisan --version", "drush core-status version"]);

        foreach ($commands as $command) {
            $data = $this->run($command);
            if (!$this->ssh->getExitStatus()) {
                return $data;
            }
        }
        return 'Geen bekend framework geinstalleerd';
    }

    /**
     *  Returns all used php plugins of website instance
     *
     * @return array
     */
    public function plugins()
    {
        $data = explode("\n", $this->run("composer show"));
        $data2 = paginateCollection($data, 5);
        return $data2;
    }

}

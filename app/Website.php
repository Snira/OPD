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
        return false;
    }

    public function subDomains(){
        $websites = collect();
        $directories = explode("\n", $this->run('cd /var/www/vhosts/'. $this->directory. '; ls | grep \'.nl\''));
        array_pop($directories);

        foreach ($directories as $websiteDirectory) {
            $website = new Website($this->ssh, $websiteDirectory);
            $websites->push($website);
        }
        $data = paginateCollection($websites,5);
        return $data;
    }


}

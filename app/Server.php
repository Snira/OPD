<?php

namespace App;

use phpseclib\Net\SSH2;

class Server
{
    private $ssh;

    public function __construct(array $credentials)
    {
        $this->login($credentials);
    }

    /**
     * @param $credentials
     */
    private function login($credentials): void
    {
        $this->ssh = new SSH2($host = $credentials['ipaddr'], $port = $credentials['port']);
        if (!$this->ssh->login($credentials['username'], $credentials['password'])) {
            exit('Login Failed');
        }
    }

    /**
     * Returns output of an SSH command
     * @param string $command
     * @return mixed
     */
    private function run(string $command)
    {
        return $this->ssh->exec($command);
    }

    /**
     * Returns an array with all the website domain names
     * @return \Illuminate\Support\Collection
     */
    public function websiteCollection()
    {
//        $command = 'cd /var/www/vhosts; ls | grep \'.nl\'';
//        return collect(explode("\n", $this->run($command)))->map(function($directory) {
//            return new Website($this->ssh, $directory);
//        })->pop();


        $websites = collect();
        $directories = explode("\n", $this->run('cd /var/www/vhosts; ls | grep \'.nl\''));
        array_pop($directories);

        foreach ($directories as $websiteDirectory) {
            $website = new Website($this->ssh, $websiteDirectory);
            $websites->push($website);
        }
        return $websites;
    }

    /**
     * Returns NodeName
     * @return string
     */
    public function nodeName()
    {
        return $this->run('uname -n');
    }

    /**
     * Returns KernelVersion
     * @return string
     */
    public function kernelVersion()
    {
        return $this->run('uname -v');
    }

    /**
     * Returns Info of ServerCPU
     * @return array
     */
    public function CPUInfo()
    {
        return explode("\n", $this->run('lscpu'));
    }

    /**
     * Returns Operating System Version
     * @return bool|string
     */
    public function OSVersion()
    {
        $data = $this->run('cat /etc/*release');
        return substr($data, 0, strpos($data, "\n"));
    }


}

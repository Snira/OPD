<?php

namespace App;

use phpseclib\Net\SSH2;

class Server
{
    use HasServerProperties;
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

    private function run(string $command)
    {
        return $this->ssh->exec($command);
    }

    /**
     * Sets an array with all the website domain names
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


}

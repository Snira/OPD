<?php

namespace App;

use Illuminate\Support\Fluent;
use phpseclib\Net\SSH2;

class Server
{
    private $ssh;
    public $websites;
    public $nodename;

    public function __construct($credentials)
    {
        $this->websites = collect();
        $this->login($credentials);

        $this->setWebsiteCollection();
        $this->setNodeName();

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

    public function setNodeName()
    {
        $this->nodename = $this->ssh->exec('uname -n');

    }

    /**
     * Sets an array with all the website domain names
     */
    public function setWebsiteCollection(): void
    {
        $directories = explode("\n", $this->ssh->exec('cd /var/www/vhosts; ls | grep \'.nl\''));
        array_pop($directories);

        foreach ($directories as $websiteDirectory) {
            $website = new Website($this->ssh, $websiteDirectory);
            $this->websites->push($website->getWebsiteInstance());
        }
    }

    public function getServerInstance()
    {
        $serverObject = new Fluent(['nodename' => $this->nodename]);

        return $serverObject;
    }


    public function getWebsiteCollection()
    {
        return $this->websites;
    }


}

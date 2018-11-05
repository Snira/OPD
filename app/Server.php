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
        $this->ssh = new SSH2($credentials['ipaddr']);
        if (!$this->ssh->login($credentials['username'], $credentials['password'])) {
            exit('Login Failed');
        }

        $this->setWebsiteCollection();
        $this->setNodeName();

    }

    public function setNodeName()
    {
        $this->nodename = $this->ssh->exec('uname -n');

    }

    public function getServerInstance()
    {
        $serverObject = new Fluent(['nodename' => $this->nodename]);

        return $serverObject;
    }

    /**
     * Sets an array with all the website domain names
     */
    public function setWebsiteCollection(): void
    {
        $directories = explode("  ", $this->ssh->exec('cd /var/www/html; dir'));

        foreach ($directories as $websiteDirectory) {
            $website = new Website($this->ssh, $websiteDirectory);
            $this->websites->push($website->getWebsiteInstance());
        }
    }

    public function getWebsiteCollection()
    {
        return $this->websites;
    }
}

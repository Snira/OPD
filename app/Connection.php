<?php

namespace App;

use phpseclib\Net\SSH2;

class Connection
{
    protected $ssh;
    private $connections = [];

    public function __construct()
    {
        $this->ssh = new SSH2();
        if (!$this->ssh->login('root', 'pos4-boy')) {
            exit('Login Failed');
        }
    }

    public function setConnections($connections){
        foreach (config()->get('connections.') as $connection){
            $connections->push($connection);
        }

    }

}

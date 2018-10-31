<?php

namespace App;

use phpseclib\Net\SSH2;

class Connection
{
    protected $ssh;

    public function __construct()
    {
        $this->ssh = new SSH2('10.11.10.141');
        if (!$this->ssh->login('root', 'pos4-boy')) {
            exit('Login Failed');
        }
    }
}

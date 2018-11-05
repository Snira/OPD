<?php

namespace App;

use phpseclib\Net\SSH2;

class Connection
{
    private $connections;

    public function __construct()
    {
        $this->setConnections();
    }



    public function getConnections()
    {
        return $this->connections;
    }


}

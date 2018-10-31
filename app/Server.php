<?php

namespace App;

use Illuminate\Support\Fluent;
use phpseclib\Net\SSH2;
use App\Connection;

class Server extends Connection
{


    public function getNodeName()
    {
//        dd($this->ssh->exec('uname -n'));
        return $this->ssh->exec('uname -n');

    }

    public function getServerInstance()
    {
        $serverObject = new Fluent(['nodename' => $this->getNodeName()]);

        return $serverObject;
    }
}

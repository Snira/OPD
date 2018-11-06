<?php

namespace App;

use phpseclib\Net\SSH2;
use Illuminate\Support\Collection;
use App\Website;
use Illuminate\Support\Fluent;
use App\Server;

class Dataset
{
    protected $server;
    protected $website;
    protected $ssh;

    public function __construct()
    {

    }

    public function getDataset()
    {
        //Combines all data and puts it in one dataset
//        $dataset = new Fluent(['server' => $this->server->getServerInstance());
//        return $dataset;
    }


}


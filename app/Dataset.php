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

    public function __construct()
    {
        $this->server = new Server();
        $this->website = new Website();
    }

    public function getDataset()
    {
        //Combines all data and puts it in one dataset
        $dataset = new Fluent(['server' => $this->server->getServerInstance(), 'websites' => $this->website->getWebsiteCollection()]);
        return $dataset;
    }


}

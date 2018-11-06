<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use App\Dataset;


class HomeController extends Controller
{
    protected $servers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->servers = collect();
        foreach (config()->get('connections') as $credentials) {
            $this->servers->push(new Server($credentials));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['servers' => $this->servers]);
    }

    public function show($nodename)
    {

        $server = $this->servers->where('nodename', $nodename)->first();

        return view('server.show',['server' => $server]);
    }
}

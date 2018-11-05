<?php

namespace App\Http\Controllers;

use App\Connection;
use App\Server;
use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use App\Dataset;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = collect();
        foreach (config()->get('connections') as $credentials) {
            $servers->push(new Server($credentials));
        }


        return view('home')->with(['servers' => $servers]);
    }
}

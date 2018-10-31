<?php

namespace App\Http\Controllers;

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
        $fetcher = new Dataset();
        // foreach $server in Serverconfig, getServerObject($name, $password). Op deze manier van Fetcher een instantie maken voor elke server.
        $dataset = $fetcher->getDataset();
//        dd($dataSet);

        return view('home')->with(['data' => $dataset]);
    }
}

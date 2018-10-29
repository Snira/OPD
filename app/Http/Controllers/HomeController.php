<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use App\Fetcher;


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
        $fetcher = new Fetcher;
        $network_name = $fetcher->serverData();
        $website_list = $fetcher->websiteList();



        $plugins =





        return view('welcome')->with(['network_name' => $network_name, 'website_list' => $website_list]);
    }
}

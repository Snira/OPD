<?php

namespace App\Http\Controllers;

use App\LatestVersions;

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
        $this->servers = servers();
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

    /**
     * Show the Server dashboard.
     *
     * @param $nodeName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($nodeName)
    {
        $server = server($nodeName);

        $latestVersions = LatestVersions::instance();

        return view('server.show', ['server' => $server, 'latestVersions' => $latestVersions]);
    }
}

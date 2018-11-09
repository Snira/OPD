<?php

namespace App\Http\Controllers;

use App\LatestVersions;

class WebsiteController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

    }

    /**
     * Show Website dashboard.
     *
     * @param $nodename
     * @param $websiteName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($nodename, $websiteName)
    {
        $server = server($nodename);
        $website = website($server, $websiteName);

        $latestVersions = LatestVersions::instance();

        return view('website.show', ['website' => $website, 'latestVersions' => $latestVersions]);
    }


}

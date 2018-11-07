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

    public function show($nodename, $websiteName)
    {
        $server = server($nodename);
        $website = website($server, $websiteName);

        $latestVersions = LatestVersions::instance();

        return view('website.show', ['website' => $website, 'latestVersions' => $latestVersions]);
    }


}

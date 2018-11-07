<?php

namespace App\Http\Controllers;

use App\Server;
use App\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\LatestVersions;

class WebsiteController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

    }

    public function show($nodename, $name)
    {
        $website = website($nodename, $name);
        $latestVersions = LatestVersions::getInstance();


        return view('website.show', ['website' => $website, 'latestVersions' => $latestVersions]);
    }


}

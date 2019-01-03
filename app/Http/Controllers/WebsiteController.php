<?php

namespace App\Http\Controllers;

use App\Directory;
use App\LatestVersions;
use App\Website;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public $latestVersions;

    public function __construct()
    {
        $this->latestVersions = LatestVersions::instance();
    }

    /**
     * Show Website dashboard.
     *
     * @param $nodename
     * @param $websiteName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function website($nodename, $websiteName)
    {

        $server = server($nodename);
        $website = website($server, $websiteName);
        $domains = null;
        if($website instanceof Directory){
            $domains = $website->subDomains();
        }

        return view('website.show', ['website' => $website, 'server' => $server, 'latestVersions' => $this->latestVersions, 'domains' => $domains]);
    }


    public function subDomain($nodename, $domainName, $websiteName)
    {
        $server = server($nodename);
        $directory = website($server, $domainName);
        $website = $directory->website($websiteName);


        return view('website.show', ['website' => $website, 'server' => $server, 'latestVersions' => $this->latestVersions]);

    }

    public function search(Request $request, $nodename, $websiteName)
    {
        $server = server($nodename);
        $website = website($server, $websiteName);
        $domains = $website->search($request->input('search'));

        return view('website.show', ['website' => $website, 'server' => $server, 'latestVersions' => $this->latestVersions, 'domains' => $domains]);
    }


}

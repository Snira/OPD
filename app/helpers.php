<?php
use App\Server;

if (!function_exists('servers')) {
    function servers()
    {
        $servers = collect();
        foreach (config()->get('connections') as $credentials) {
            $servers->push(new Server($credentials));
        }
        return $servers;
    }
}

if (!function_exists('website')) {
    function website($nodename, $websiteName)
    {
        $server = servers()->where('nodename', $nodename)->first();
        $website = $server->websites->where('name', $websiteName)->first();
        return $website;
    }
}

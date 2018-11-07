<?php

use App\Server;
use App\Website;
use Illuminate\Support\Collection;

if (!function_exists('servers')) {
    function servers(): Collection
    {
        return collect(config('connections'))->transform(function (array $credentials) {
            return new Server($credentials);
        });
    }
}

if (!function_exists('server')) {
    function server($nodeName): Server
    {
        foreach (servers() as $server) {
            if ($server->nodeName() == $nodeName) {
                return $server;
            }
        }
    }
}

if (!function_exists('website')) {
    function website(Server $server, string $directory): Website
    {
        return $server->websiteCollection()->where('directory', $directory)->first();
    }
}

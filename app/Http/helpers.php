<?php

use App\Server;
use App\Website;
use Illuminate\Support\Collection;

/**
 * Returns Collection including instance for all servers
 *
 * @param array $credentials
 *
 */
if (!function_exists('servers')) {
    function servers(): Collection
    {
        return collect(config('connections'))->transform(function (array $credentials) {
            return new Server($credentials);
        });
    }
}

/**
 * Returns instance of Server
 *
 * @param string $nodeName
 *
 */
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

/**
 * Returns instance of Website
 *
 * @param Server $server
 * @param string $directory
 *
 */
if (!function_exists('website')) {
    function website(Server $server, string $directory): Website
    {
        return $server->websiteCollection()->where('directory', $directory)->first();
    }
}

/**
 * Returns paginated collection
 *
 * @param array $items
 * @param integer $perPage
 * @param integer $page
 * @param array $options
 *
 */
if (!function_exists('paginateCollection')) {
    function paginateCollection($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}

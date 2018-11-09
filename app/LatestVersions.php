<?php

namespace App;

final class LatestVersions
{
    private static $instance = null;

    const LARAVELURL = 'https://packagist.org/packages/laravel/framework.json';

    private function __construct()
    {

    }

    /**
     * @return static::$instance
     */
    public static function instance()
    {
        if (!static::$instance) {
            static::$instance = new LatestVersions();
        }
        return static::$instance;
    }

    /**
     * @return mixed
     */
    public function latestLaravel()
    {
        $data = json_decode(file_get_contents(self::LARAVELURL), true);
        $versions = $data['package']['versions'];

        foreach ($versions as $version) {
            if (substr($version['version'], 0, 1) === "v") {
                return $version['version'];
            }
        }
    }
}

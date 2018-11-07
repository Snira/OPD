<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

final class LatestVersions
{
    protected static $instance = null;
    public $laravel;

    const LARAVELURL = 'https://packagist.org/packages/laravel/framework.json';

    private function __construct()
    {
        $this->setLatestLaravel();
    }

    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new LatestVersions();
        }
        return static::$instance;
    }

    public function setLatestLaravel()
    {
        $data = json_decode(file_get_contents(self::LARAVELURL), true);
        $versions = $data['package']['versions'];

        foreach ($versions as $version) {
            if (substr($version['version'], 0, 1) === "v") {
                $this->laravel = $version['version'];
                break;
            }
        }

    }
}

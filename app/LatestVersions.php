<?php

namespace App;

final class LatestVersions
{
    private static $instance = null;

    const LARAVEL_URL = 'https://packagist.org/packages/laravel/framework.json';
    const DRUPAL_URL = 'https://packagist.org/packages/drupal/drupal.json';

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
    public function laravel()
    {
        $data = json_decode(file_get_contents(self::LARAVEL_URL), true);
        $versions = $data['package']['versions'];

        foreach ($versions as $version) {
            if (substr($version['version'], 0, 1) === "v") {
                return $version['version'];
            }
        }
    }

    /**
     * @return mixed
     */
    public function drupal()
    {
        $data = json_decode(file_get_contents(self::DRUPAL_URL), true);
        $versions = $data['package']['versions'];

        foreach($versions as $version){
            if(strlen($version['version']) == 5){
                return $version['version'];
            }
        }
    }
}

<?php

namespace App;

final class LatestVersions
{
    private static $instance = null;

    const LARAVEL_URL = 'https://packagist.org/packages/laravel/framework.json';
    const DRUPAL_URL = 'https://packagist.org/packages/drupal/drupal.json';
    const PHP_URL = 'http://nl1.php.net/releases/?json&version=7';
    const CENTOS_URL = 'http://opensource.wandisco.com/centos/';
    const HTTPFOUNDDATION_URL = 'https://packagist.org/packages/symfony/http-foundation.json';

    /**
     * Constructor set private so it can only be instantiated once from instance()
     *
     * LatestVersions constructor.
     */
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
     * Returns latest Laravel version
     *
     * @return mixed
     */
    public function laravel()
    {
        $data = json_decode(file_get_contents(self::LARAVEL_URL), true);
        $versions = $data['package']['versions'];

        foreach ($versions as $version) {
            if (substr($version['version'], 0, 1) === "v") {
                return substr($version['version'], 1);
            }
        }
    }

    /**
     * Returns latest Drupal version
     *
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

    /**
     * Returns latest php version
     *
     * @return bool|string
     */
    public function php()
    {
        $data = json_decode(file_get_contents(self::PHP_URL),true);
        return substr($data["version"],0, 3);
    }

    public function CentOS()
    {
        $data = explode("\n" ,file_get_contents(self::CENTOS_URL));
        dd($data);
    }

    /**
     * Returns latest httpfoundation version (non beta)
     *
     * @return bool|string
     */
    public function httpfoundation(){
        $data = json_decode(file_get_contents(self::HTTPFOUNDDATION_URL),true);
        $versions = $data['package']['versions'];

        foreach($versions as $version){
            if(strlen($version['version']) == 6){
                return substr($version['version'], 1);
            }
        }
    }
}

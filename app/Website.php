<?php

namespace App;

use phpDocumentor\Reflection\Types\Boolean;
use Spatie\SslCertificate\SslCertificate;
use phpseclib\Net\SSH2;


class Website
{
    private $ssh;
    public $directory;
    public $framework;
    public $status;

    public function __construct(SSH2 $ssh, string $directory)
    {
        $this->ssh = $ssh;
        $this->directory = $directory;
        $this->status = 0;
    }

    /**
     * Returns output of an SSH command
     * @param string $command
     * @return mixed
     */
    private function run(string $command)
    {
        return $this->ssh->exec("cd /var/www/vhosts/'$this->directory';" . $command);
    }

    /**
     * Returns status of website
     *
     * @param $serverDir
     * @param $websiteDir
     *
     */
    public function status($domainDir, $websiteDir)
    {

        $php = substr($this->ssh->exec("cd /var/www/vhosts/'$domainDir'/'$websiteDir'; php -v"), 4, 5);

        if (!$this->https()){
            $this->status ++;
        }
        if ((float)$php < 5.6){
            $this->status ++;
        }

        return $this->status;


    }

    /**
     * Returns name of website
     *
     * @return string
     */
    public function name()
    {
        $arr = explode("/", $this->directory, 2);
        if (empty($arr[1])) {
            return $this->directory;
        } else {
            return $arr[1];
        }

    }

    /**
     * Returns used php version & sets framework property of website
     */
    public function frameworkVersion()
    {
        $data = $this->laravel();
        if (!$data) {
            $data = $this->drupal();
        }
        return $data;
    }

    /**
     * If the used framework is Laravel, this returns it's version
     *
     * @return bool|null|string
     */
    public function laravel()
    {
        $data = $this->run("php artisan --version");
        if (!$this->ssh->getExitStatus()) {
            $this->framework = 'Laravel';
            return substr($data, -7);
        }
        return null;
    }

    /**
     * If the used framework is Drupal, this returns it's version
     *
     * @return bool|null|string
     */
    public function drupal()
    {
        $data = (string)$this->run("drush version");
        if (!$this->ssh->getExitStatus()) {
            $this->framework = 'Drupal';
            $parse = substr($data, -8);
            $parse2 = substr($parse, 0, 5);

            return $parse2;
        }
        return null;
    }

    /**
     *  Returns all used php plugins of website instance
     *
     * @return array
     */
    public function plugins()
    {
        $data = explode("\n", $this->run("composer show"));
        if (substr($data[0], 0, 7) == 'Warning') {
            $data = ['Er is een fout bij het ophalen van plugins', 'De server geeft het volgende terug: ', $data[0]];
        };
        $data2 = paginateCollection($data, 8);
        return $data2;
    }

    /**
     * Returns php version used by website
     *
     * @return bool|string
     */
    public function phpVersion()
    {
        $data = $this->run('php -v');
        return substr($data, 3, 4);
    }

    /**
     * Checks if website is online and reachable
     *
     * @return bool
     */
    public function online()
    {
        $this->run('ping -c 3 ' . $this->name());
        if (!$this->ssh->getExitStatus()) {
            return true;
        }
        return false;
    }

    /**
     * Checks if website has SSL and if the certificate is valid
     *
     * @return bool
     */
    public function https()
    {
        try {
            $data = SslCertificate::createForHostName($this->name());
            return $data->isValid();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function symfonyhttp()
    {
        $data = explode("\n", $this->run('composer show symfony/http-foundation'));
        return substr($data[3], 14, 6);
    }

    public function polyfill()
    {
        $data = explode("\n", $this->run('composer show symfony/polyfill-php56'));
        return substr($data[3], 14, 6);
    }


}

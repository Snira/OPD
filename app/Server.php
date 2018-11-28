<?php

namespace App;

use Carbon\Carbon;
use phpseclib\Net\SSH2;
use App\Directory;

class Server
{
    private $ssh;

    public function __construct(array $credentials)
    {
        $this->login($credentials);
    }

    /**
     * @param $credentials
     */
    private function login($credentials): void
    {
        $this->ssh = new SSH2($host = $credentials['ipaddr'], $port = $credentials['port']);
        if (!$this->ssh->login($credentials['username'], $credentials['password'])) {
            exit('Login Failed');
        }
    }

    /**
     * Returns output of an SSH command
     * @param string $command
     * @return mixed
     */
    private function run(string $command)
    {
        return $this->ssh->exec($command);
    }

    /**
     * Returns an array with all the website domain names
     * @return \Illuminate\Support\Collection
     */
    public function websiteCollection()
    {
        $websites = collect();
        $directories = explode("\n", $this->run('cd /var/www/vhosts; ls | grep \'.nl\''));
        array_pop($directories);

        foreach ($directories as $websiteDirectory) {
            if ($this->run('cd /var/www/vhosts/' . $websiteDirectory . '/bin;')) {
                $website = new Website($this->ssh, $websiteDirectory);
                $websites->push($website);
            } else {
                $websites->push(new Directory($this->ssh, $websiteDirectory));
            }
        }
        return $websites;
    }

    /**
     * Returns NodeName
     * @return string
     */
    public function nodeName()
    {
        return $this->run('uname -n');
    }

    /**
     * Returns KernelVersion
     * @return string
     */
    public function kernelVersion()
    {
        return $this->run('uname -v');
    }

    /**
     * Checks if kernel has been updated this year (should be ok for now)
     *
     * @return bool
     */
    public function kernelUpToDate()
    {
        $data = $this->run('uname -v');
        $val = (integer)substr($data, 31, 4);
        if ($val < date("Y")) {
            return false;
        }
        return true;
    }

    /**
     * Returns Info of ServerCPU
     * @return array
     */
    public function CPUInfo()
    {
        $data = explode("\n", $this->run('lscpu'));
        array_pop($data);
        return $data;
    }

    /**
     * Returns Operating System Version
     * @return bool|string
     */
    public function OSVersion()
    {
        $data = $this->run('cat /etc/*release');
        return substr($data, 0, strpos($data, "\n"));
    }

    /**
     * Returns if plesk is used on server
     * @return bool
     */
    public function hasPlesk()
    {
        $query = 'This server is powered by Plesk.';
        $data = explode("\r\r\n\r\n", $this->ssh->read($query));
        if ($query == isset($data[1])) {
            return true;
        }
        return false;
    }

    public function pleskVersion()
    {
        $data = $this->run('rpm -q psa');
        return $data;
    }




}

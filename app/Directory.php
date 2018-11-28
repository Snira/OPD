<?php

namespace App;
use phpseclib\Net\SSH2;

class Directory
{
    private $ssh;
    public $directory;

    public function __construct(SSH2 $ssh, string $directory)
    {
        $this->ssh = $ssh;
        $this->directory = $directory;
    }

    private function run(string $command)
    {
        return $this->ssh->exec("cd /var/www/vhosts/'$this->directory';" . $command);
    }

    public function name()
    {
        return $this->directory;
    }

    public function subDomains(){
        $websites = collect();
        $directories = explode("\n", $this->run('cd /var/www/vhosts/'. $this->directory. '; ls | grep \'.nl\''));
        array_pop($directories);

        foreach ($directories as $websiteDirectory) {
            $website = new Website($this->ssh, $websiteDirectory);
            $websites->push($website);
        }
        $data = paginateCollection($websites,10);
        return $data;
    }

    public function website($directory){
        $website = new Website($this->ssh, $this->directory.'/'.$directory);
        return $website;
    }
}

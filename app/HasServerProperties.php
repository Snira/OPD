<?php

namespace App;


trait HasServerProperties
{
    public function nodeName()
    {
        return $this->run('uname -n');
    }

    public function kernelVersion()
    {
        return $this->run('uname -v');
    }

    public function CPUInfo()
    {
        return explode("\n", $this->run('lscpu'));
    }

    public function OSVersion()
    {
        $data = $this->run('cat /etc/*release');
        return substr($data, 0, strpos($data, "\n"));
    }
}
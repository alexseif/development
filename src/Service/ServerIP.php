<?php

namespace App\Service;


class ServerIP
{
    private $serviceURI = "http://ipecho.net/plain";

    public function get()
    {
        return file_get_contents($this->serviceURI);
    }
}
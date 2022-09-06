<?php

namespace App\Service;


class ServerIP
{
    public function get()
    {
        return $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    }
}
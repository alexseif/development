<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/


namespace App\Exceptions;

use Exception;


class TypeNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('Type not found');
    }
}
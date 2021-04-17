<?php

namespace App\Infrastructure\Exception;

use Exception;

class ClientException extends Exception
{
    public function __construct(Exception $e)
    {
        parent::__construct();
        $this->message = 'Connection to punkApi error: '.$e->getMessage();
    }
}

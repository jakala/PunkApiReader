<?php

namespace App\Infrastructure\Exception;

use Exception;

/**
 * Class ClientException.
 */
class ClientException extends Exception
{
    /**
     * ClientException constructor.
     */
    public function __construct(Exception $e)
    {
        parent::__construct();
        $this->message = 'Connection to punkApi error: '.$e->getMessage();
    }
}

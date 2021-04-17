<?php
namespace App\Infrastructure\Exception;

use Exception;

/**
 * Class ClientException
 * @package App\Infrastructure\Exception
 */
class ClientException extends Exception
{
    /**
     * ClientException constructor.
     * @param Exception $e
     */
    public function __construct(Exception $e)
    {
        parent::__construct();
        $this->message = 'Connection to punkApi error: '.$e->getMessage();
    }
}

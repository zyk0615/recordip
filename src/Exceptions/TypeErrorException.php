<?php

namespace ZYKUtil\RecordIp\Exceptions;

use Exception;

class TypeErrorException extends Exception
{
    public function __construct($message = null)
    {
        $this->message = $message == null ? 'Type or config Types setting error' : $message;
        parent::__construct();
    }
}

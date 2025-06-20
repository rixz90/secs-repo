<?php

namespace App\Exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found :';

    public function __construct($viewPath, $errorCode = 0)
    {
        $this->message .= explode('/', $viewPath)[1];
    }
}

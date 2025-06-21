<?php

namespace App\Exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found :';

    public function __construct($viewPath)
    {
        $this->message .= explode('/', $viewPath)[1];
    }
}

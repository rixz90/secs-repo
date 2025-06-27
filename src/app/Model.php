<?php

namespace App;

use Doctrine\DBAL\Connection;

abstract class Model
{
    protected Connection $db;

    public function __construct()
    {
        $this->db = App::db();
    }
}

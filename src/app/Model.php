<?php

namespace App;

use Doctrine\ORM\EntityManager;

abstract class Model
{
    protected EntityManager $em;

    public function __construct()
    {
        $this->em = App::entityManager();
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Location as LocationEntity;
use App\Model;

class Location extends Model
{
    public function createLocation(): bool | array
    {
        try {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            if (empty($name) || !$name) {
                return false;
            }
            $loc = (new LocationEntity())
                ->setName($name);
            $this->em->persist($loc);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchLocationById($param = null): array
    {
        $id =  $param === null ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
            : filter_var($param, FILTER_VALIDATE_INT);
        if (!$id) {
            return [];
        }

        $loc = $this->em->createQueryBuilder()->select('l')
            ->from(LocationEntity::class, 'l')
            ->where('l.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
        return $loc;
    }

    public function fetchAllLocations(): array
    {
        $user = $this->em->createQueryBuilder()->select('l')
            ->from(LocationEntity::class, 'l')
            ->getQuery()
            ->getArrayResult();
        return $user;
    }

    public function updateLocation(): bool | array
    {
        try {

            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return false;
            }
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);

            /** @var LocationEntity $loc */
            $loc = $this->em->find(LocationEntity::class, $id);
            $loc != $loc->getName() ? $loc->setName($name) : '';
            $this->em->persist($loc);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['err' => $e->getMessage()];
        }
    }

    public function dropLocation(): bool
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return false;
        }
        /** @var LocationEntity $loc */
        $loc = $this->em->find(LocationEntity::class, $id);
        if (!$loc) {
            return false;
        }
        $this->em->remove($loc);
        $this->em->flush();
        return true;
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Location as LocationEntity;
use App\Model;

class Location extends Model
{
    public function createLocation(): int | array
    {
        try {
            $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
            if (empty($address) || !$address) {
                return ['error' => 'Missing input'];
            }
            $loc = new LocationEntity();
            $loc->setAddress($address);
            $this->em->persist($loc);
            $this->em->flush();
            return $loc->getId();
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchLocationById($param = null): array
    {
        if ($param === null) {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        } else {
            $id = filter_var($param, FILTER_VALIDATE_INT);
        }
        if (!$id) {
            return ['error' => 'Missing id'];
        }

        $loc = $this->em->createQueryBuilder()->select('l')
            ->from(LocationEntity::class, 'l')
            ->where('l.id=:id')
            ->setParameter('id', $id)
            ->getQuery();
        return $loc->getArrayResult();
    }

    public function fetchAllLocations(): array
    {
        $user = $this->em->createQueryBuilder()->select('l')
            ->from(LocationEntity::class, 'l')
            ->getQuery();
        return $user->getArrayResult();
    }

    public function updateLocation(): bool | array
    {
        try {

            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return false;
            }
            $address = htmlspecialchars($_PUT['address'], ENT_QUOTES);

            /** @var LocationEntity $loc */
            $loc = $this->em->find(LocationEntity::class, $id);

            if ($loc != $loc->getAddress()) {
                $loc->setAddress($address);
            }

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
    public function fetchList(): array
    {
        return  $this->em->createQueryBuilder()->select('l.id, l.address')
            ->from(LocationEntity::class, 'l')
            ->getQuery()
            ->getArrayResult();
    }
}

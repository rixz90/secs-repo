<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Location as LocationEntity;
use Doctrine\ORM\EntityManager;

class Location
{
    public function __construct(protected EntityManager $em) {}

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

    public function update(): bool | array
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

    public function delete(): array
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input'];
        }
        /** @var LocationEntity $loc */
        $loc = $this->em->find(LocationEntity::class, $id);
        if (!$loc) {
            return ['error' => 'Location not found'];
        }
        $this->em->remove($loc);
        $this->em->flush();
        return ['message' => "Id $id is deleted"];
    }
    public function fetchList(): array
    {
        return  $this->em->createQueryBuilder()->select('l.id, l.address')
            ->from(LocationEntity::class, 'l')
            ->getQuery()
            ->getArrayResult();
    }
}

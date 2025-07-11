<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Branch as BranchEntity;
use App\Entities\Location;
use App\Model;
use Throwable;

class Branch extends Model
{
    public function create(): array
    {
        try {
            $code = htmlspecialchars($_POST['code'], ENT_QUOTES);
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $locationIds = $_POST['locations'] ?? [];
            if (empty($code) || empty($name)) {
                return ['error' => 'Missing Input'];
            }
            $bran = (new BranchEntity());
            foreach ($locationIds as $locationId) {
                if (filter_var($locationId, FILTER_VALIDATE_INT)) {
                    $location = $this->em->getReference(Location::class, $locationId);
                    $bran->addLocation($location);
                }
            }
            $bran->setCode($code)
                ->setName($name);
            $this->em->persist($bran);
            $this->em->flush();
            return ['message' => "Created branch id: " . $bran->getId()];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchBranchById($param = null): array
    {
        $id =  $param === null ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
            : filter_var($param, FILTER_VALIDATE_INT);
        if (!$id) {
            return [];
        }

        $bran = $this->em->createQueryBuilder()->select('b', 'l')
            ->from(BranchEntity::class, 'b')
            ->leftJoin('b.locations', 'l')
            ->where('b.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
        return $bran;
    }

    public function fetchAllNameBranches(): array
    {
        $bran = $this->em->createQueryBuilder()->select('b.code, b.name')
            ->from(BranchEntity::class, 'b')
            ->getQuery()
            ->getArrayResult();
        return $bran;
    }

    public function fetchAllBranches(): array
    {
        $bran = $this->em->createQueryBuilder()->select('b')
            ->from(BranchEntity::class, 'b')
            ->getQuery()
            ->getArrayResult();
        return $bran;
    }

    public function update(): array
    {
        try {
            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (empty($id)) {
                return ['error' => 'id not found'];
            }
            $code = htmlspecialchars($_PUT['code'], ENT_QUOTES);
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);
            $locationIds = $_PUT['locations'] ?? [];

            /** @var \App\Entities\Branch $bran */
            $bran = $this->em->find(BranchEntity::class, $id);
            foreach ($bran->getLocations() as $loc) {
                $bran->removeLocation($loc);
            }
            foreach ($locationIds as $locationId) {
                $location = $this->em->getReference(Location::class, $locationId);
                $bran->addLocation($location);
            }
            $name != $bran->getName() ? $bran->setName($name) : '';
            $code != $bran->getCode() ? $bran->setCode($code) : '';
            $this->em->persist($bran);
            $this->em->flush();
            return ['message' => "Id no $id has been updated."];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function delete(): array
    {
        try {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (!$id) {
                return ['error' => 'Missing Input'];
            }
            /** @var BranchEntity $bran */
            $bran = $this->em->getRepository(BranchEntity::class)->find($id);
            if (empty($bran)) {
                return ['error' => 'user not found'];
            }
            /** @var \App\Entities\Location $loc */
            foreach ($bran->getLocations() as $loc) {
                $loc->removeBranch($bran);
            }
            $this->em->persist($bran);
            $this->em->remove($bran);
            $this->em->flush();
            return ["message" => "Branch : $id is removed"];
        } catch (Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function fetchList(): array
    {
        return $this->em->createQueryBuilder()->select('b.code, b.name, b.id')
            ->from(BranchEntity::class, 'b')
            ->getQuery()
            ->getArrayResult();
    }
}

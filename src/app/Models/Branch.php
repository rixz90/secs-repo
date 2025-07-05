<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Branch as BranchEntity;
use App\Model;

class Branch extends Model
{
    public function createBranch(): bool | array
    {
        try {
            $code = htmlspecialchars($_POST['code'], ENT_QUOTES);
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            if (empty($code) || empty($name)) {
                return false;
            }
            $bran = (new BranchEntity())
                ->setCode($code)
                ->setName($name);
            $this->em->persist($bran);
            $this->em->flush();
            return true;
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

        $bran = $this->em->createQueryBuilder()->select('b')
            ->from(BranchEntity::class, 'b')
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

    public function updateBranch(): bool | array
    {
        try {

            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return false;
            }
            $code = htmlspecialchars($_PUT['code'], ENT_QUOTES);
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);

            /** @var BranchEntity $bran */
            $bran = $this->em->find(BranchEntity::class, $id);
            $name != $bran->getName() ? $bran->setName($name) : '';
            $code != $bran->getCode() ? $bran->setCode($code) : '';
            $this->em->persist($bran);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['err' => $e->getMessage()];
        }
    }

    public function dropBranch(): bool
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return false;
        }
        /** @var BranchEntity $bran */
        $bran = $this->em->find(BranchEntity::class, $id);
        if (!$bran) {
            return false;
        }
        $this->em->remove($bran);
        $this->em->flush();
        return true;
    }
}

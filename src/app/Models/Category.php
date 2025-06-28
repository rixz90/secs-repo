<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Category as CategoryEntity;
use App\Model;

class Category extends Model
{
    public function createCategory(): bool | array
    {
        try {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            if (empty($name)) {
                return false;
            }
            $cat = (new CategoryEntity())
                ->setName($name);
            $this->em->persist($cat);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchCategoryById($param = null): array
    {
        $id =  $param === null ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
            : filter_var($param, FILTER_VALIDATE_INT);
        if (!$id) {
            return [];
        }

        $cat = $this->em->createQueryBuilder()->select('c')
            ->from(CategoryEntity::class, 'c')
            ->where('c.id=:id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
        return $cat;
    }

    public function fetchAllCategories(): array
    {
        $cat = $this->em->createQueryBuilder()->select('b')
            ->from(CategoryEntity::class, 'b')
            ->getQuery()
            ->getArrayResult();
        return $cat;
    }

    public function updateCategory(): bool | array
    {
        try {

            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if (!$id) {
                return false;
            }
            $name = htmlspecialchars($_PUT['name'], ENT_QUOTES);

            /** @var CategoryEntity $bran */
            $cat = $this->em->find(CategoryEntity::class, $id);
            $name != $cat->getName() ? $cat->setName($name) : '';
            $this->em->persist($cat);
            $this->em->flush();
            return true;
        } catch (\Throwable $e) {
            return ['err' => $e->getMessage()];
        }
    }

    public function dropCategory(): bool
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return false;
        }
        /** @var CategoryEntity $bran */
        $cat = $this->em->find(CategoryEntity::class, $id);
        if (!$cat) {
            return false;
        }
        $this->em->remove($cat);
        $this->em->flush();
        return true;
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Complaint as ComplaintEntity;
use App\Entities\Location;
use App\Entities\Branch;
use App\Entities\Category;
use App\Enums\ComplaintStatus;
use App\Model;
use DateTime;
use DateTimeZone;

class Complaint extends Model
{
    public function create(): array
    {
        try {
            // Input array
            $input = [
                'title' => htmlspecialchars($_POST['title']),
                'desc' => htmlspecialchars($_POST['desc']),
                'image' => htmlspecialchars($_POST['image'] ?? '')
            ];
            // Define filters for each key
            $filters = [
                'title' => FILTER_SANITIZE_SPECIAL_CHARS,
                'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
                'image' => FILTER_SANITIZE_URL
            ];
            $var = filter_var_array($input, $filters);
            $user = (new \App\Models\User)->createUser();
            $locations = $_POST['locations'] ?? [];
            $branch = $_POST['branch'];
            $category = $_POST['category'];
            $complaint = (new ComplaintEntity)
                ->setTitle($var['title'])
                ->setDesc($var['desc'])
                ->setImage($var['image'])
                ->setStatus(ComplaintStatus::Pending)
                ->setCreatedAt(new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur')))
                ->setUser($user);
            foreach ($locations as $id) {
                if (filter_var($id, FILTER_VALIDATE_INT)) {
                    $loc = $this->em->getReference(Location::class, $id);
                    $complaint->addLocation($loc);
                }
            }
            if (filter_var($branch, FILTER_VALIDATE_INT)) {
                $bran = $this->em->getReference(Branch::class, $branch);
                $complaint->addBranch($bran);
            }
            if (filter_var($category, FILTER_VALIDATE_INT)) {
                $cat = $this->em->getReference(Category::class, $category);
                $complaint->addCategory($cat);
            }
            $this->em->persist($complaint);
            $this->em->flush();
            return ['id' => $complaint->getId()];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchById($param = null): array
    {
        if (empty($param)) {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        } else {
            $id = filter_var($param, FILTER_VALIDATE_INT);
        }
        if (!$id) {
            return ['error' => 'Missing id'];
        }
        $complaint = $this->em->createQueryBuilder()
            ->select('c')
            ->from(ComplaintEntity::class, 'c')
            ->where('c.id=:id')
            ->setParameter('id', $id)
            ->getQuery();
        return $complaint->getArrayResult();
    }
    public function fetchAll(): array
    {
        $complaint = $this->em->createQueryBuilder()->select('c')
            ->from(ComplaintEntity::class, 'c')
            ->where("c.deletedAt is null")
            ->getQuery();
        return $complaint->getArrayResult();
    }

    public function fetchLeftJoinAll(): array
    {
        $qb = $this->em->createQueryBuilder();
        $complaint = $this->em->createQueryBuilder()
            ->select('c.id', 'c.title', 'c.description', 'c.createdAt', 'c.updatedAt', 'c.completedAt', 'c.status', 'l.address', 'b.name as braName', 'ca.name as catName')
            ->from(ComplaintEntity::class, 'c')
            ->leftJoin('c.locations', 'l')
            ->leftJoin('c.branches', 'b')
            ->leftJoin('c.categories', 'ca')
            ->where($qb->expr()->isNull('c.deletedAt'))
            ->getQuery();
        return  $complaint->getArrayResult();
    }

    public function fetchLeftJoinById($id): array
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $qb = $this->em->createQueryBuilder();
        $complaint = $this->em->createQueryBuilder()
            ->select('c', 'l', 'b', 'ca', 'u')
            ->from(ComplaintEntity::class, 'c')
            ->leftJoin('c.locations', 'l')
            ->leftJoin('c.branches', 'b')
            ->leftJoin('c.categories', 'ca')
            ->innerJoin('c.user', 'u')
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('c.id', ':id'),
                    $qb->expr()->isNull('c.deletedAt')
                )
            )
            ->setParameter('id', $id)
            ->getQuery();
        return $complaint->getArrayResult();
    }

    public function update(): array
    {
        try {
            parse_str(file_get_contents('php://input'), $_PUT);
            $input = [
                'id' => $_PUT['id'],
                'title' => htmlspecialchars($_PUT['title']),
                'desc' => htmlspecialchars($_PUT['desc']),
                'image' => htmlspecialchars($_PUT['image'] ?? ''),
            ];
            $filters = [
                'id' => FILTER_VALIDATE_INT,
                'title' => FILTER_SANITIZE_SPECIAL_CHARS,
                'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
                'image' => FILTER_SANITIZE_URL,
            ];
            $var = filter_var_array($input, $filters);
            $locations = $_PUT['locations'] ?? [];
            $branches = $_PUT['branch'] ?? [];
            $categories = $_PUT['category'] ?? [];

            $branches = is_array($branches) ? $branches : [$branches];
            $categories = is_array($categories) ? $categories : [$categories];

            if (empty($var['id'])) {
                return ['error' => 'Missing id'];
            }
            /** @var ComplaintEntity $comp */
            $comp = $this->em->find(ComplaintEntity::class, $var['id']);
            if (empty($comp)) {
                return ['error' => 'Complaint not found'];
            }
            foreach ($comp->getLocations() as $loc) {
                $comp->removeLocation($loc);
            }
            foreach ($comp->getBranches() as $bran) {
                $comp->removeBranch($bran);
            }
            foreach ($comp->getCategories() as $cat) {
                $comp->removeCategory($cat);
            }
            foreach ($locations as $id) {
                if (filter_var($id, FILTER_VALIDATE_INT)) {
                    $loc = $this->em->getReference(Location::class, $id);
                    $comp->addLocation($loc);
                }
            }
            foreach ($branches as $id) {
                if (filter_var($id, FILTER_VALIDATE_INT)) {
                    $bran = $this->em->getReference(Branch::class, $id);
                    $comp->addBranch($bran);
                }
            }
            foreach ($categories as $id) {
                if (filter_var($id, FILTER_VALIDATE_INT)) {
                    $cat = $this->em->getReference(Category::class, $id);
                    $comp->addCategory($cat);
                }
            }
            $var['title'] != $comp->getTitle() ? $comp->setTitle($var['title']) : '';
            $var['desc'] != $comp->getDesc() ? $comp->setDesc($var['desc']) : '';
            $var['image'] != $comp->getImage() ? $comp->setImage($var['image']) : '';
            $comp->setUpdatedAt(new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur')));
            $this->em->persist($comp);
            $this->em->flush();
            return ['message' => "Update is successful for id " . $comp->getId()];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function softDelete(): array
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input id or Invalid'];
        }
        /** @var ComplaintEntity $comp */
        $comp = $this->em->find(ComplaintEntity::class, $id);
        if (empty($comp)) {
            return ['error' => 'User not found'];
        }
        $comp->setDeletedAt(new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur')));
        $this->em->persist($comp);
        $this->em->flush();
        return ['message' => 'soft delete id ' . $comp->getId()];
    }

    public function hardDelete(): array
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input'];
        }
        /** @var ComplaintEntity $comp */
        $comp = $this->em->find(ComplaintEntity::class, $id);
        if ($comp === null) {
            return ['error' => 'user not found'];
        }
        $this->em->remove($comp);
        $this->em->flush();
        return [];
    }
}

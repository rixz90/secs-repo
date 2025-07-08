<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Complaint as ComplaintEntity;
use App\Entities\User;
use App\Entities\Location;
use App\Entities\Branch;
use App\Entities\Category;
use App\Enums\ComplaintStatus;
use App\Model;
use DateTime;

class Complaint extends Model
{
    public function create(): array
    {
        try {
            // Input array
            $input = [
                'title' => htmlspecialchars($_POST['title']),
                'desc' => htmlspecialchars($_POST['desc']),
                'image' => htmlspecialchars($_POST['image']),
                'locationId' => $_POST['location'],
                'branchId' => $_POST['branch'],
                'categoryId' => $_POST['category']
            ];
            // Define filters for each key
            $filters = [
                'title' => FILTER_SANITIZE_SPECIAL_CHARS,
                'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
                'image' => FILTER_SANITIZE_URL,
                'locationId' => FILTER_SANITIZE_NUMBER_INT,
                'branchId' => FILTER_SANITIZE_NUMBER_INT,
                'categoryId' => FILTER_SANITIZE_NUMBER_INT
            ];
            $var = filter_var_array($input, $filters);
            if (!empty($var['studentId'])) {
                $user = $this->em->getRepository(User::class)->findOneBy(['studentId' => $var['studentId']]);
            } elseif (!empty($var['employeeId'])) {
                $user = $this->em->getRepository(User::class)->findOneBy(['employeeId' => $var['employeeId']]);
            }
            if (empty($user)) {
                $user = (new \App\Models\User)->createUser();
            }
            if (is_array($user) || empty($user)) {
                return ["error" => 'Creating or fetching user failed'];
            }
            $location = $this->em->getRepository(Location::class)->find($var['locationId']);
            $branch = $this->em->getRepository(Branch::class)->find($var['branchId']);
            $category = $this->em->getRepository(Category::class)->find($var['categoryId']);
            $complaint = new ComplaintEntity();
            $complaint
                ->setTitle($var['title'])
                ->setDesc($var['desc'])
                ->setImage($var['image'])
                ->setStatus(ComplaintStatus::Pending)
                ->setLocation($location)
                ->setBranch($branch)
                ->setCategory($category)
                ->setCreatedAt(new DateTime())
                ->setUser($user);
            $this->em->persist($complaint);
            $this->em->flush();
            return ['id' => $complaint->getId()];
        } catch (\Throwable $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function fetchById($param = null): array
    {
        if ($param === null) {
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

    public function fetchInnerJoinAll()
    {
        $complaint = $this->em->createQueryBuilder()
            ->select('c.title', 'c.createdAt', 'c.status', 'l.address', 'b.name as braName', 'ca.name as catName')
            ->from(ComplaintEntity::class, 'c')
            ->innerJoin('c.location', 'l')
            ->innerJoin('c.branch', 'b')
            ->innerJoin('c.category', 'ca')
            ->where("c.deletedAt is null")
            ->getQuery();
        return  $complaint->getArrayResult();
    }

    public function fetchInnerJoinById($id): ComplaintEntity | null
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $complaint = $this->em->createQueryBuilder()
            ->select('c', 'l', 'b', 'ca', 'u')
            ->from(ComplaintEntity::class, 'c')
            ->innerJoin('c.location', 'l')
            ->innerJoin('c.branch', 'b')
            ->innerJoin('c.category', 'ca')
            ->innerJoin('c.user', 'u')
            ->where('c.id = :id and c.deletedAt is null')
            ->setParameter('id', $id)
            ->getQuery();
        return $complaint->getOneOrNullResult();
    }

    public function update(): array
    {
        try {
            parse_str(file_get_contents('php://input'), $_PUT);
            $id = filter_var($_PUT['id'], FILTER_VALIDATE_INT);
            if ($id === null) {
                return ['error' => 'Missing Input'];
            }
            $title = htmlspecialchars($_PUT['title'], ENT_QUOTES);
            $desc = htmlspecialchars($_PUT['desc'], ENT_QUOTES);
            // $image = filter_var($_PUT['image'], FILTER_SANITIZE_URL);

            /** @var ComplaintEntity $comp */
            $comp = $this->em->find(ComplaintEntity::class, $id);
            $title != $comp->getTitle() ? $comp->setTitle($title) : '';
            $desc != $comp->getDesc() ? $comp->setDesc($desc) : '';
            // $image != $comp->getImage() ? $comp->setImage($image) : '';
            $comp->setUpdatedAt(new DateTime());
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
        if ($comp === null) {
            return ['error' => 'User not found'];
        }
        $comp->setDeletedAt(new DateTime());
        $this->em->persist($comp);
        $this->em->flush();
        return ['id' => $comp->getId()];
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

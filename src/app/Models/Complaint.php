<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Complaint as ComplaintEntity;
use App\Entities\User;
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
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'desc' => $_POST['desc'],
                'image' => $_POST['image'],
            ];
            // Define filters for each key
            $filters = [
                'user_id' => FILTER_VALIDATE_INT,
                'title' => FILTER_SANITIZE_SPECIAL_CHARS,
                'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
                'image' => FILTER_SANITIZE_URL,
            ];
            $var = filter_var_array($input, $filters);
            $userId = $var['user_id'];
            if (!$userId) {
                return ['error' => 'Missing input'];
            }
            $title = htmlspecialchars($var['title']);
            $desc = htmlspecialchars($var['desc']);
            $img = $var['image'];
            $user = $this->em->getRepository(User::class)->find($userId);
            $complaint = new ComplaintEntity();
            $complaint
                ->setTitle($title)
                ->setDesc($desc)
                ->setImage($img)
                ->setStatus(ComplaintStatus::Pending)
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

        $complaint = $this->em->createQueryBuilder()->select('c')
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
            ->getQuery();
        return $complaint->getArrayResult();
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
            $image = filter_var($_PUT['image'], FILTER_SANITIZE_URL);

            /** @var ComplaintEntity $comp */
            $comp = $this->em->find(ComplaintEntity::class, $id);

            $title != $comp->getTitle() ? $comp->setTitle($title) : '';
            $desc != $comp->getDesc() ? $comp->setDesc($desc) : '';
            $image != $comp->getImage() ? $comp->setImage($image) : '';
            $comp->setUpdatedAt(new DateTime());
            $this->em->persist($comp);
            $this->em->flush();
            return ['id' => $comp->getId()];
        } catch (\Throwable $e) {
            return ['err' => $e->getMessage()];
        }
    }

    public function softDelete(): array
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $id = filter_var($_DELETE['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            return ['error' => 'Missing Input'];
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

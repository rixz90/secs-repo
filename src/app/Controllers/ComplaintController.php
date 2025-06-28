<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Complaint;

class ComplaintController
{
    public function anyIndex()
    {
        $response = (new Complaint)->fetchAll();
        return json_encode($response);
    }

    public function anyComplaint(string $param): string
    {
        $response = (new Complaint)->fetchById($param);
        return json_encode($response);
    }

    public function getComplaint(): string
    {
        $response = (new Complaint)->fetchById();
        return json_encode($response);
    }

    public function postComplaint(): string
    {
        $response = (new Complaint)->create();
        return json_encode($response);
    }

    public function putComplaint(): string
    {
        $response =  (new Complaint)->update();
        return json_encode($response);
    }

    public function deleteComplaint(): string
    {
        $response =  (new Complaint)->hardDelete();
        return json_encode($response);
    }
}

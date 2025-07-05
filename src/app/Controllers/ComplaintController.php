<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Complaint;
use App\View;

class ComplaintController
{
    public function anyIndex()
    {
        $complaints = (new Complaint)->fetchAll();
        return (string) View::make('@tables/complaint', ["complaints" => $complaints]);
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

    public function getForm(): string
    {
        parse_str($_SERVER['QUERY_STRING'], $params);

        if ($params['type'] == 'ng') {
            return (string) View::make('@forms/non-guest');
        }
        return (string) View::make('@forms/base');
    }
}

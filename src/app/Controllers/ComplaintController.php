<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Location;
use App\View;

class ComplaintController
{
    public function anyIndex()
    {
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (isset($params['table']) && $params['table'] == 'semakan') {
            $complaints = (new Complaint)->fetchInnerJoinAll();
            return View::make('@tables/semakan', ['complaints' => $complaints])->render();
        } else {
            $complaints = (new Complaint)->fetchAll();
            return View::make('@tables/complaint', ["complaints" => $complaints])->render();
        }
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
        if (isset($_POST['_method']) && $_POST['_method'] == 'put') {
            return $this->putComplaint();
        }
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
        $arr = [
            'branches' => (new Branch)->fetchList(),
            'locations' => (new Location)->fetchList(),
            'categories' => (new Category)->fetchList()
        ];
        if (isset($params['type'])) {
            return match (htmlspecialchars($params['type'])) {
                'ng' => View::make('@forms/non-guest', $arr)->render(),
                'g' => View::make('@forms/base', $arr)->render(),
                default => json_encode(["error" => 'Form not found'])
            };
        } else if (isset($params['method']) == 'update' && isset($params['id'])) {
            $complaint = (new Complaint)->fetchInnerJoinById($params['id']);
            if (empty($complaint)) {
                return json_encode(["error" => 'Id not found']);
            }
            $arr['complaint'] = $complaint;
            $arr['method'] = "PUT";
            return View::make('@forms/non-guest', $arr)->render();
        }
        return json_encode(["error" => 'Form not found']);
    }
}

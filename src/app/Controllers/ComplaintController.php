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
    public function anyIndex(): string
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
        $complaints = (new Complaint)->fetchById($param);
        return View::make('@tables/complaint', ['complaints' => $complaints])->render();
    }

    public function getComplaint(): string
    {
        $complaints = (new Complaint)->fetchById();
        return View::make('@tables/complaint', ['complaints' => $complaints])->render();
    }

    public function postComplaint(): string
    {
        $response = (new Complaint)->create();
        $complaints = (new Complaint)->fetchAll();
        return View::make('@tables/complaint', ['complaints' => $complaints], $response)->render();
    }

    public function putComplaint(): string
    {
        $response =  (new Complaint)->update();
        $complaints = (new Complaint)->fetchAll();
        return View::make('@tables/complaint', ['complaints' => $complaints], $response)->render();
    }

    public function deleteComplaint(): string
    {
        $response =  (new Complaint)->softDelete();
        $complaints = (new Complaint)->fetchAll();
        return View::make('@tables/complaint', ['complaints' => $complaints], $response)->render();
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

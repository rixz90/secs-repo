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
    public function anyIndex() {}

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
        $complaints = (new Complaint)->fetchLeftJoinAll();
        return View::make('@tables/semakan', ['complaints' => $complaints], $response)->render();
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
    public function anyTable(string $type): string
    {
        $complaints = (new Complaint)->fetchLeftJoinAll();
        return match (htmlspecialchars($type)) {
            'semakan' => View::make('@tables/semakan', ['complaints' => $complaints])->render(),
            'admin' => View::make('@tables/complaint', ["complaints" => $complaints])->render()
        };
    }
    public function getForm(string $type): string
    {
        $arr = [
            'branches' => (new Branch)->fetchList(),
            'categories' => (new Category)->fetchList()
        ];
        return match (htmlspecialchars($type)) {
            'ng' => View::make('@forms/non-guest', $arr)->render(),
            'g' => View::make('@forms/base', $arr)->render(),
            default => json_encode(["error" => 'Form not found'])
        };
    }
    public function anyEdit(string $id): string
    {
        $complaint = (new Complaint)->fetchLeftJoinById($id);
        if (empty($complaint)) {
            return json_encode(["error" => 'Id not found']);
        }
        $arr = [
            'branches' => (new Branch)->fetchList(),
            'locations' => (new Location)->fetchList(),
            'categories' => (new Category)->fetchList()
        ];
        $arr['complaints'] = $complaint;
        $arr['method'] = "PUT";
        return View::make('@forms/non-guest', $arr)->render();
    }
    public function anyLocation(): string
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $branchId = filter_input(INPUT_GET, 'branch', FILTER_VALIDATE_INT);
        if (empty($id) || empty($branchId)) {
            return "";
        }

        $bran = (new Branch)->fetchBranchById($branchId);
        $comp = (new Complaint)->fetchLeftJoinById($id);
        $locations = $bran[0]['locations'];
        $complaint = $comp[0];

        return View::make('@lists/locationList', ["locations" => $locations, "complaint" => $complaint])->render();
    }
}

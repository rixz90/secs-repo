<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;
use App\Models\Location;
use App\View;

class BranchController
{
    public function anyIndex(): string
    {
        $branches = (new Branch)->fetchAllBranches();
        return View::make('@tables/branch', ["branches" => $branches])->render();
    }
    public function getBranch(): string
    {
        $response = (new Branch)->fetchBranchById();
        return json_encode($response);
    }
    public function postBranch(): string
    {
        $response = (new Branch)->create();
        $branches = (new Branch)->fetchAllBranches();
        return View::make('@tables/branch', ["branches" => $branches, "response" => $response])->render();
    }
    public function putBranch(): string
    {
        $response =  (new Branch)->update();
        $branches = (new Branch)->fetchAllBranches();
        return View::make('@tables/branch', ["branches" => $branches, "response" => $response])->render();
    }
    public function deleteBranch(): string
    {
        $response =  (new Branch)->delete();
        $branches = (new Branch)->fetchAllBranches();
        return View::make('@tables/branch', ['branches' => $branches, "response" => $response])->render();
    }
    public function anyEdit(string $id): string
    {
        $bran = (new Branch)->fetchBranchById($id);
        $loc = (new Location)->fetchList();
        if (empty($bran)) {
            return json_encode(["error" => 'Id not found']);
        }
        $arr['branches'] = $bran;
        $arr['locations'] = $loc;
        $arr['method'] = "PUT";
        return View::make('@panels/branchPanel', $arr)->render();
    }
    public function anyLocation(): string
    {
        $branchId = filter_input(INPUT_GET, 'branch', FILTER_VALIDATE_INT);
        if (empty($branchId)) {
            return "";
        }
        $bran = (new Branch)->fetchBranchById($branchId);
        $locations = $bran[0]['locations'];
        return View::make('@lists/locationList', ["locations" => $locations])->render();
    }
}

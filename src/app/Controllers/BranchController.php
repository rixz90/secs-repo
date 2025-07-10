<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;
use App\Models\Location;
use App\View;
use Exception;
use Throwable;

class BranchController
{
    public function anyIndex(): string
    {
        $branches = (new Branch)->fetchAllBranches();
        return View::make('@tables/branch', ["branches" => $branches])->render();
    }

    public function anyBranch(string $param): string
    {
        $response = (new Branch)->fetchBranchById($param);
        return json_encode($response);
    }

    public function getBranch(): string
    {
        $response = (new Branch)->fetchBranchById();
        return json_encode($response);
    }

    public function postBranch(): string
    {
        $response = (new Branch)->createBranch();
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

    public function getForm(): string
    {
        parse_str($_SERVER['QUERY_STRING'], $params);

        if (isset($params['method']) == 'update' && isset($params['id'])) {
            $bran = (new Branch)->fetchBranchById($params['id']);
            $loc = (new Location)->fetchList();
            if (empty($bran)) {
                return json_encode(["error" => 'Id not found']);
            }
            $arr['branches'] = $bran;
            $arr['locations'] = $loc;
            $arr['method'] = "PUT";
            return View::make('@panels/branchPanel', $arr)->render();
        }
        return json_encode(["error" => 'Form not found']);
    }
}

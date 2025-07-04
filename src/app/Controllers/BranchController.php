<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Branch;

class BranchController
{
    public function anyIndex()
    {
        $response = (new Branch)->fetchAllBranches();
        // Return some View
        echo "<h1>Hello</h1>";
        //return json_encode($response);
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
        return json_encode($response);
    }

    public function putBranch(): string
    {
        $response =  (new Branch)->updateBranch();
        return json_encode($response);
    }

    public function deleteBranch(): string
    {
        $response =  (new Branch)->dropBranch();
        return json_encode($response);
    }
}

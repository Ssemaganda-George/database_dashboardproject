<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //Show all branches
    public function showBranches()
    {
        $branches = Branch::all();
        return view('branch',[
            'branches' => $branches
        ]);
    }
}
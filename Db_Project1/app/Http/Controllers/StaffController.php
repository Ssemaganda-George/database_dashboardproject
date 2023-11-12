<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //Show all staff
    public function showStaffs()
    {
        $staffs = Staff::all();
        return view('staff',[
            'staffs' => $staffs
        ]);
    }

}

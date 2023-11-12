<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //Show All Members
    public function showMembers()
    {
        $members = Member::all();
        return view('member',[
            'members' => $members
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{

    //show all members
    public function showAllMembers()
    {
        $member = Member::with('branch')->get();

        $success = session('success') ? session('success') : null;

        return view('member.index', [
            'members' => $member,
            'success' => $success
        ]);
    }

    //create the member view
    public function createMemberView(Request $request)
    {
        $branches = Branch::all();
        $viewData = ['branches' => $branches];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('member.create', $viewData);
    }

    //store the member
    public function store(Request $request)
    {
        try {
            $requestData = $request->validate([
                'member_number' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'member_address' => 'required',
                'registration_date' => 'required',
                'branch_number'=> 'required|exists:branch,BranchNumber',
                'balance'  => 'required',
                // add other fields as necessary
            ]);

            $member = new Member;
            $member->MemberNumber = $requestData['member_number'];
            $member->FirstName = $requestData['first_name'];
            $member->LastName = $requestData['last_name'];
            $member->Address = $requestData['member_address'];
            $member->RegistrationDate = $requestData['registration_date'];
            $member->BranchNumber = $requestData['branch_number'];
            $member->Balance = $requestData['balance'];
            // set other fields as necessary

            $member->save();

            // Redirect to a success page (modify as needed)
            return redirect()->route('member')->with('success', 'Member created successfully');
        } catch (ValidationException $e) {
            return redirect()->route('member.create')->withErrors($e->validator);
        }
    }

    //show the edit page
    public function edit(Request $request, $member_id)
    {
        $branches = Branch::all();
        $member = Member::where('BranchNumber', $member_id)->first();
        $viewData = ['branches' => $branches, 'members' => $member];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('member.edit', $viewData);
    }

    //update the member table
    public function update(Request $request, $member_id)
    {
        try {
            $requestData = $request->validate([
                'member_number' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'member_address' => 'required',
                'registration_date' => 'required',
                'branch_number'=> 'required|exists:branch,BranchNumber',
                'balance'  => 'required',
                // add other fields as necessary
            ]);
            $newdata = [
                'MemberNumber' => $requestData['member_number'],
                'FirstName'=> $requestData['first_name'],
                'LastName' => $requestData['last_name'],
                'Address' => $requestData['member_address'],
                'RegistrationDate' => $requestData['registration_date'],
                'BranchNumber' => $requestData['branch_number'],
                'Balance' => $requestData['balance'],
            ];

            $member = Member::where('MemberNumber', $member_id)->first();

            if ($member) {
                $member->update($newdata);

                // Redirect to a success page (modify as needed)
                return redirect()->route('member')->with('success', 'Member updated successfully');
            } else {
                return redirect()->route('member.edit')->withErrors('Member not found');
            }
        } catch (ValidationException $e) {
            return redirect()->route('member.edit', $member_id)->withErrors($e->validator);
        }
    }

    //delete the member
    public function destroy($member_id)
    {
        $member = Member::where('MemberNumber', $member_id)->first();

        if ($member) {
            $member->delete();

            // Redirect to a success page (modify as needed)
            return redirect()->route('member')->with('success', 'Member deleted successfully');
        } else {
            return redirect()->route('member')->withErrors('Member not found');
        }
    }
}


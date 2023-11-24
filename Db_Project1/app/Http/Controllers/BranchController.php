<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Video;
use App\Models\Member;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BranchController extends Controller
{

    //show all branches
    public function showAllBranches()
    {
        $branch = Branch::with('branch')->get();

        $success = session('success') ? session('success') : null;

        return view('branch.index', [
            'branches' => $branch,
            'success' => $success
        ]);
    }

    //create the branch view
    public function createBranchView(Request $request)
    {
        $branches = Branch::all();
        $viewData = ['branches' => $branches];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('branch.create', $viewData);
    }

    //store the branch
    public function store(Request $request)
    {
        try {
            $requestData = $request->validate([
                'branch_number' => 'required|exists:branch,BranchNumber',
                'branch_address' => 'required',
                'telephone' => 'required',
                
                // add other fields as necessary
            ]);

            $branch = new Branch;
            $branch->BranchNumber = $requestData['branch_number'];
            $branch->Address = $requestData['branch_address'];
            // set other fields as necessary

            $branch->save();

            // Redirect to a success page
            return redirect()->route('branch')->with('success', 'Branch created successfully');
        } catch (ValidationException $e) {
            return redirect()->route('branch.create')->withErrors($e->validator);
        }
    }

    //show the edit page
    public function edit(Request $request, $branch_id)
    {
        $branches = Branch::all();
        $branch = Branch::where('BranchNumber', $branch_id)->first();
        $viewData = ['branches' => $branches];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('branch.edit', $viewData);
    }

    //update the branch table
    public function update(Request $request, $branch_id)
    {
        try {
            $requestData = $request->validate([
                'branch_number' => 'required|exists:branch,BranchNumber',
                'branch_address' => 'required',
                'telephone' => 'required',
                // add other fields as necessary
            ]);
            $newdata = [
                'BranchNumber' => $requestData['branch_number'],
                'Address'=> $requestData['branch_address'],
                'Telephone' => $requestData['telephone'],
            ];

            $branch = Branch::where('MemberNumber', $branch_id)->first();

            if ($branch) {
                $branch->update($newdata);

                // Redirect to a success page (modify as needed)
                return redirect()->route('branch')->with('success', 'Branch updated successfully');
            } else {
                return redirect()->route('branch.edit')->withErrors('Branch not found');
            }
        } catch (ValidationException $e) {
            return redirect()->route('branch.edit', $branch_id)->withErrors($e->validator);
        }
    }

    //delete the branch and associated records
    public function destroy($branch_id)
    {
        $branch = Branch::where('BranchNumber', $branch_id)->first();

        if ($branch) {
            $deletedBranchNumber = $branch->BranchNumber;
            $deletedBranchAaddress = $branch->Address;

            // Delete associated staff,video and member records associated with the deleted branch.
            Staff::where('BranchNumber', $branch->BranchNumber)->delete();
            Video::where('BranchNumber', $branch->BranchNumber)->delete();
            Member::where('BranchNumber', $branch->BranchNumber)->delete();

            // Delete the branch itself
            $branch->delete();

            // Redirect to a success page
            return redirect()->route('branch')->with('success', "Branch $deletedBranchNumber of $deletedBranchAaddress and all associated records deleted successfully");
        } else {
            return redirect()->route('branch')->withErrors('Branch not found');
        }
    }
}


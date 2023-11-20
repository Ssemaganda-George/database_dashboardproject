<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{

    //show all staff
    public function showAllStaffs()
    {
        $staffs = Staff::with('branch')->get();

        $success = session('success') ? session('success') : null;

        return view('staff.index', [
            'staffs' => $staffs,
            'success' => $success
        ]);
    }

    //create the staff view
    public function createStaffView(Request $request)
    {
        $branches = Branch::all();
        $viewData = ['branches' => $branches];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('staff.create', $viewData);
    }

    //store the staff
    public function store(Request $request)
    {
        try {
            $requestData = $request->validate([
                'name' => 'required',
                'position' => 'required',
                'branch_number' => 'required|exists:branch,BranchNumber',
                'salary' => 'required',
                // add other fields as necessary
            ]);

            $staff = new Staff;
            $staff->name = $requestData['name'];
            $staff->position = $requestData['position'];
            $staff->BranchNumber = $requestData['branch_number'];
            $staff->salary = $requestData['salary'];
            // set other fields as necessary

            $staff->save();

            // Redirect to a success page (modify as needed)
            return redirect()->route('staff')->with('success', 'Staff created successfully');
        } catch (ValidationException $e) {
            return redirect()->route('staff.create')->withErrors($e->validator);
        }
    }

    //show the edit page
    public function edit(Request $request, $staff_id)
    {
        $branches = Branch::all();
        $staff = Staff::where('StaffNumber', $staff_id)->first();
        $viewData = ['branches' => $branches, 'staff' => $staff];

        if ($request->session()->has('errors')) {
            $viewData['errors'] = $request->session()->get('errors');
        }

        return view('staff.edit', $viewData);
    }

    //update the staff table
    public function update(Request $request, $staff_id)
    {
        try {
            $requestData = $request->validate([
                'name' => 'required',
                'position' => 'required',
                'branch_number' => 'required|exists:branch,BranchNumber',
                'salary' => 'required',
                // add other fields as necessary
            ]);

            $staff = Staff::where('StaffNumber', $staff_id)->first();

            if ($staff) {
                $staff->update($requestData);

                // Redirect to a success page (modify as needed)
                return redirect()->route('staff')->with('success', 'Staff updated successfully');
            } else {
                return redirect()->route('staff.edit')->withErrors('Staff not found');
            }
        } catch (ValidationException $e) {
            return redirect()->route('staff.edit', $staff_id)->withErrors($e->validator);
        }
    }

    //delete the staff
    public function destroy($staff_id)
    {
        $staff = Staff::where('StaffNumber', $staff_id)->first();

        if ($staff) {
            $staff->delete();

            // Redirect to a success page (modify as needed)
            return redirect()->route('staff')->with('success', 'Staff deleted successfully');
        } else {
            return redirect()->route('staff')->withErrors('Staff not found');
        }
    }
}


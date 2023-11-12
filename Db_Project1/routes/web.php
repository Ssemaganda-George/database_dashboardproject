<?php

use App\Http\Controllers\BranchController;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BranchController::class,'showBranches']);
Route::get('/',[VideoController::class,'showVideos']);
Route::get('/',[RentalController::class,'showRentals']);
Route::get('/',[MemberController::class,'showMembers']);
Route::get('/',[StaffController::class,'showStaffs']);

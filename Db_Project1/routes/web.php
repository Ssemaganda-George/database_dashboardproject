<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\VideoController;
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
// branches
Route::get('/branch',[BranchController::class,'showAllBranches'])->name('branch');
Route::post('/branch', [BranchController::class, 'store'])->name('branch.store');
Route::get('/branch/create', [BranchController::class, 'createBranchView'])->name('branch.create');
Route::get('/branch/{branch_id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
Route::put('/branch/{branch_id}', [BranchController::class, 'update'])->name('branch.update');
Route::get('/branch/{branch_id}', [BranchController::class, 'destroy'])->name('branch.destroy');

// staff
Route::get('/staff',[StaffController::class,'showAllStaffs'])->name('staff');
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff/create', [StaffController::class, 'createStaffView'])->name('staff.create');
Route::get('/staff/{staff_id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{staff_id}', [StaffController::class, 'update'])->name('staff.update');
Route::get('/staff/{staff_id}', [StaffController::class, 'destroy'])->name('staff.destroy');



// videos
Route::get('/videos',[VideoController::class,'showVideos'])->name('videos');
Route::get('/videos/{video_id}', [RentalController::class, 'showVideoDetails'])->name('rentals.video.one');

// rentals
Route::get('/rentals',[RentalController::class,'showRentals'])->name('rentals');
Route::get('/rentals/{video_id}', [RentalController::class, 'showVideoDetails'])->name('rentals.video');
Route::get('/rentals/downloadpdf/{video_id}', [RentalController::class, 'exportVideoPdf'])->name('rentals.video.pdf');


// members
Route::get('/member',[MemberController::class,'showAllMembers'])->name('member');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/create', [MemberController::class, 'createMemberView'])->name('member.create');
Route::get('/member/{member_id}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('/member/{member_id}', [MemberController::class, 'update'])->name('member.update');
Route::get('/member/{member_id}', [MemberController::class, 'destroy'])->name('member.destroy');


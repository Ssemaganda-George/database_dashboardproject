<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    //Show all Rentals
    public function showRentals()
    {
        $rentals = Rental::all();
        return view('rental',[
            'rentals' => $rentals
        ]);
    }
}

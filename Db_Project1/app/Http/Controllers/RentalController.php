<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Video;

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

    //single video
    public function showVideoDetails($video_id)
    {
        $video_details = Rental::where('video_number', $video_id)->get();
        $video = Video::where('video_number', $video_id)->first();
        $sum_of_daily_rental = Rental::where('video_number', $video_id)->sum('daily_rental');

        return view('video', [
            'video_details' => $video_details,
            'video' => $video,
            'total' => $sum_of_daily_rental
        ]);
    }

    public function exportVideoPdf($video_id)
    {
        $video_details = Rental::where('video_number', $video_id)->get();
        $video = Video::where('video_number', $video_id)->first();
        $sum_of_daily_rental = Rental::where('video_number', $video_id)->sum('daily_rental');

        $pdf = app('dompdf.wrapper')->loadView('pdf', [
            'video_details' => $video_details,
            'video' => $video,
            'total' => $sum_of_daily_rental
        ]);

        return $pdf->download('report.pdf');
    }
}

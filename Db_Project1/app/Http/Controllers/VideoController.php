<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //Show all Videos.
    public function showvideos()
    {
        $videos = Video::all();
        return view('video', [
            'videos' => $videos
        ]);
    }
}
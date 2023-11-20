<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model

{
    use HasFactory;

    protected $table = "rental";

    public function member()
    {
        return  $this->belongsTo(Member::class, 'member_number', 'member_number');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_number', 'video_number');
    }
}


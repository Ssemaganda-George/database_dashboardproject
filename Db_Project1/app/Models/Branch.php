<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'branch';
    protected $primaryKey = 'BranchNumber';

    public $timestamps = false;

    public $fillable = ['BranchNumber','Address', 'Telephone'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'BranchNumber', 'BranchNumber');
    }
}

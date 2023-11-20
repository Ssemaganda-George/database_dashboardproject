<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'member';
    protected $primaryKey = 'MemberNumber';

    public $timestamps = false;

    public $fillable = ['MemberNumber','FirstName', 'LastName', 'Address', 'RegistrationDate', 'BranchNumber', 'Balance'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'BranchNumber', 'BranchNumber');
    }
}

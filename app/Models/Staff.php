<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Add other attributes here that you want to allow mass assignment for
        'father_name',
        'dob',
        'number',
        'address',
        'designation',
        'sallery',
        'gender',
    ];
    protected $table = 'staff';
    protected $primaryKey = 'id';
}

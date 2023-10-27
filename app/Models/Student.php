<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Add other attributes here that you want to allow mass assignment for
        'father_name',
        'mother_name',
        'dob',
        'number',
        'class_name',
        'roll_number',
        'aadhar_number',
        'samagra_id',
        'address',
        'gender',
        'category',
        'transport_service',
        'pickup_drop_point',
        'rte',
        'year',
        // Add more attributes as needed
    ];
    protected $table = 'student';
    protected $primaryKey = 'id';
}


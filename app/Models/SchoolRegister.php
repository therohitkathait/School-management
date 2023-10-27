<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SchoolRegister extends Authenticatable
{
    use HasFactory;
    protected $table = 'school_register';
    protected $primaryKey = 'id';
}

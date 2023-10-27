<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksheetExtra extends Model
{
    use HasFactory;
    protected $table = 'add_marksheet_extra';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_id',
        'subject',
        'marks',
    ];
}

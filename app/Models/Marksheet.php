<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marksheet extends Model
{
    use HasFactory;
    protected $table = 'marksheet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_id',
        'subject',
        'obtained_marks',
        'half_yearly_marks',
        'project_marks',
    ];
}

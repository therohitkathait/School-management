<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySpend extends Model
{
    use HasFactory;
    protected $table = 'daily_spend';
    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportFees extends Model
{
    use HasFactory;
    protected $table = 'transport_fees';
    protected $primaryKey = 'id';
}

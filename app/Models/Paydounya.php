<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paydounya extends Model
{
    use HasFactory; 
    protected $fillable = [
        'name',
        'quantity',
        'unit_price',
        'total_price',
        'nomc',
        'adresse',
        'client_cni',
        'boutque_id',
    ];
}

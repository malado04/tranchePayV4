<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;
    protected $fillable = [
        'verset',
        'enregistrercommande_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function enregistrercommande()
    {
        return $this->belongsTo(enregistrercommande::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enregistrercommande extends Model 
{
    use HasFactory;
    protected $fillable = [
        'nomproduit',
        'prix',
        'montantverset',
        'adresselivraison',
        'client_id',
        'delaipaye',
        'montantpayer',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function versement()
    {
        return $this->hasMany(versement::class);		
    }
}

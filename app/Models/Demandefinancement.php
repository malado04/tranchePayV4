<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandefinancement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomboutique',
        'nomproduit',
        'lienproduit',
        'adresseboutique',
        'adresselivraison',
        'prix',
        'montantverset',
        'nombremois',
        'montantpayer',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    
}

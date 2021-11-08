<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'prenom',
        'nom',
        'boutique',
        'site',
        'valide',
        'email',
        'image',
        'type',
        'commentaire',
        'categorie',
        'telephone',
        'password',
    ];
    public function enregistrercommande()
    {
        return $this->hasMany(enregistrercommande::class);		
    }
    public function demandefinancement()
    {
        return $this->hasMany(demandefinancement::class);		
    }
    public function aide()
    {
        return $this->hasMany(aide::class);		
    }
    public function versement()
    {
        return $this->hasMany(versement::class);		
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aide extends Model
{
    use HasFactory;
    protected $fillable = [
        'sujet',
        'message',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }

}

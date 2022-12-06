<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\User;

class Profile extends Model
{
    protected $fillable = [
        'user_profile','about','picture','facebook','twitter'
    ];

    public function user() {
        return $this->belongsTo(Usar::class);
    }
}

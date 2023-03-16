<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnquete extends Model
{
    use HasFactory;
    protected $table = ('user_enquete');

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function enquete()
    {
        return $this->hasMany(Enquete::class, 'enquete_id');
    }
}

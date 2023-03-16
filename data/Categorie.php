<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = ('categories');

    public function enquete()
    {
        return $this->hasMany(Enquete::class, 'categorie_id');
    }
}
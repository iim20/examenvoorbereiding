<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;
    protected $table = ('enquetes');
    protected $fillable = ['title'];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $table = 'machines';
    public function storingen()
    {
        return $this->hasMany(Storing::class);
    }
    public function locatie()
    {
        return $this->belongsTo(Locatie::class);
    }
}

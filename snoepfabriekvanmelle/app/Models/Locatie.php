<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locatie extends Model
{
    use HasFactory;
    protected $table = 'locaties';

    public function machine()
    {
        return $this->hasMany(Machine::class);
    }

    public function medewerker()
    {
        return $this->belongsTo(Medewerker::class);
    }
    
}

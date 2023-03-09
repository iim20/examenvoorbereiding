<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storing extends Model
{
    use HasFactory;
    protected $fillable = ['description'];
    protected $table = 'storingen';

    public function statusniveau()
    {
        return $this->belongsTo(Statusniveau::class);
    }

    public function statusupdate()
    {
        return $this->belongsTo(Statusupdate::class);
    }
    
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function medewerker()
    {
        return $this->belongsTo(Medewerker::class);
    }
}

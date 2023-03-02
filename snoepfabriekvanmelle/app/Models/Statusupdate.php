<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusupdate extends Model
{
    use HasFactory;
    protected $table = "statusupdate";
    
    public function storing()
    {
        return $this->hasOne(Storing::class);
    }
}

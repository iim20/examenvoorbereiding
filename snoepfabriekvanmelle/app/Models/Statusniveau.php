<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusniveau extends Model
{
    use HasFactory;
    protected $table= "statusniveau";

    public function storing()
    {
        return $this->hasOne(Storing::class);
    }
}

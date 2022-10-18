<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographers extends Model
{
    use HasFactory;

    public function photos(){
        return $this->hasMany(Photos::class,'photographer_id');
    }
}

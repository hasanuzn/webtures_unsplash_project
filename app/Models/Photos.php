<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    public function urls(){
        return $this->hasOne(PhotosUrl::class,'photo_id');
    }
    
    public function photographer(){
        return $this->hasOne(Photographers::class,'id','photographer_id');
    }
}

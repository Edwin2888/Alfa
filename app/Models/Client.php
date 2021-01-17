<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','phone','id_city','created_at','updated_at'
    ];

    protected function city(){
        return $this->belongsTo(City::class, 'id_city', 'id');
    }
}

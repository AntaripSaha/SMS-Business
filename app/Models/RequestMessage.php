<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestMessage extends Model
{
    use HasFactory;

    public function database(){
        return $this->belongsTo(Database::class, 'area', 'id' );   
    }
    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id' );   
    }
}

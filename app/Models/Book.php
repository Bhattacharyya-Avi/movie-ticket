<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function movieSeats(){
        return $this->hasMany(Movies_seat::class,'books_id','id');
    }

    public function seat(){
        return $this->belongsToMany(Seat::class);
    }

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}

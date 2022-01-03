<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies_seat extends Model
{
    use HasFactory;
    protected $table="movies_seat";
    protected $guarded=[];

    public function seat(){
        return $this->belongsTo(Seat::class);
    }
}

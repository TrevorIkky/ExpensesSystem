<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = "payments";
    protected $fillable = ['receipt','amount'];
    
}

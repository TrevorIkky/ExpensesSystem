<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crockery extends Model
{
    //
    protected $table = "crockery";
    protected $fillable = ['crockeryname','quantity'];
}

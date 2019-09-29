<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';
    protected $fillable = ['expenseType','amount','notes','date_created']; 
    public $timestamps = false;
}

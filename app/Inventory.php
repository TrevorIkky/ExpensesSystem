<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table1 = 'drinks';
    protected $fillable = ['DrinkName','unitOfMeasurement','inventoryAmount','costPerUnit','totalCost','vendor','quantity']; 
}

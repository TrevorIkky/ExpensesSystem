<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['DrinkName','unitOfMeasurement','inventoryAmount','costPerUnit','totalCost','vendor','quantity']; 
}

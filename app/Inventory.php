<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';
    protected $fillable = [	'foodTypeNo', 	'name', 'url' ,  'type' ,	'unitOfMeasurement', 	'inventoryAmount', 'costPerUnit', 	'totalCost' , 'vendor' ,'quantity'];

}

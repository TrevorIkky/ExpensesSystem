<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';
    protected $fillable = [	'foodTypeNo', 	'name', 'url' ,  'type' ,	'unitOfMeasurement', 	'inventoryAmount', 'costPerUnit', 	'totalCost' , 'vendor' ,'quantity'];

<<<<<<< HEAD
=======
   
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c
}

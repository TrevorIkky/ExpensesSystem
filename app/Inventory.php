<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $fillable = ['DrinkName','unitOfMeasurement','inventoryAmount','costPerUnit','totalCost','vendor','quantity']; 

    public static function updateData($id,$data){
        DB::table('inventory')
          ->where('id', $id)
          ->update($data);
      }
    
      public static function deleteData($id){
        DB::table('inventory')->where('id', '=', $id)->delete();
      }
}

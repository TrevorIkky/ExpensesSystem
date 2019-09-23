<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fooditems', function (Blueprint $table){
            $table->increments('foodTypeNo');
            $table->string('unitOfMeasurement',150);
            $table->string('inventoryAmount',150);
            $table->integer('costPerUnit');
            $table->string('totalCost');
            $table->string('vendor',150);
            
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('fooditems');
    }
}

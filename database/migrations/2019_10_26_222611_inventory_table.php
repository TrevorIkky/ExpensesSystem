<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inventory', function (Blueprint $table){
            $table->increments('foodTypeNo');
            $table->string('name',150);
            $table->string('unitOfMeasurement',150);
            $table->string('inventoryAmount',150);
            $table->integer('costPerUnit');
            $table->string('totalCost');
            $table->string('vendor',150);       
            $table->integer('quantity');
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
        
        Schema::dropIfExists('inventory');
    }
}

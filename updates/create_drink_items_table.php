<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDrinkItemsTable extends Migration
{

    public function up()
    {
        Schema::create('stone_foodmenu_drink_items', function($table)
        {
            $table->engine = 'InnoDB';
	        $table->increments('id')->unsigned();
	        $table->string('name');
	        $table->text('description')->nullable();
	        $table->text('price')->nullable();
	        $table->boolean('enable')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stone_foodmenu_drink_items');
    }

}

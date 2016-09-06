<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFoodCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('stone_foodmenu_food_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
	        $table->string('name');
	        $table->string('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stone_foodmenu_food_categories');
    }

}

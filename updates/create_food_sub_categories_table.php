<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFoodSubCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('stone_foodmenu_food_sub_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('subname');
            $table->string('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stone_foodmenu_food_sub_categories');
    }

}

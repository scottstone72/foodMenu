<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMenuItemDirectorsTable extends Migration
{
    public function up()
    {
        Schema::create('stone_foodmenu_menu_item_directors', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stone_foodmenu_menu_item_directors');
    }
}

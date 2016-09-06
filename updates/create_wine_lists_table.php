<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateWineListsTable extends Migration
{

    public function up()
    {
        Schema::create('stone_foodmenu_wine_lists', function($table)
        {
            $table->engine = 'InnoDB';
	        $table->increments('id')->unsigned();
	        $table->string('variety');
	        $table->string('brand')->nullable();
	        $table->text('description')->nullable();
	        $table->text('price')->nullable();
	        $table->boolean('enable')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stone_foodmenu_wine_lists');
    }

}

<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateWineCategoriesWineListsTable extends Migration
{

	public function up()
	{
		Schema::create('stone_wine_categories_wine_lists', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('wine_list_id')->unsigned();
			$table->integer('wine_category_id')->unsigned();
			$table->primary(['wine_list_id', 'wine_category_id'], 'primary_ids');
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('stone_wine_categories_wine_lists');
	}

}
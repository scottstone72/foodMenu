<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDrinkCategoriesDrinkItemsTable extends Migration
{

	public function up()
	{
		Schema::create('stone_drink_categories_drink_items', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('drink_item_id')->unsigned();
			$table->integer('drink_category_id')->unsigned();
			$table->primary(['drink_item_id', 'drink_category_id'], 'primary_ids');
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('stone_drink_categories_drink_items');
	}

}
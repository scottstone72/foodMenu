<?php namespace Stone\FoodMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFoodSubCategoriesMenuItemsPivotTable extends Migration
{

	public function up()
	{
		Schema::create('stone_foodmenu_food_sub_categories_menu_items_pivot', function($table)
		{
			$table->engine = 'InnoDB';
			$table->integer('menu_item_id')->unsigned();
			$table->integer('food_sub_category_id')->unsigned();
			$table->primary(['menu_item_id', 'food_sub_category_id'], 'primary_ids');
		});
	}

	public function down()
	{
		Schema::dropIfExists('stone_foodmenu_food_sub_categories_menu_items_pivot');
	}

}
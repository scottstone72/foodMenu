<?php namespace Stone\FoodMenu\Components;

use Cms\Classes\ComponentBase;
use Stone\FoodMenu\Models\DrinkItem;
use Stone\FoodMenu\Models\DrinkCategory;

class DrinkMenus extends ComponentBase
{

	public $drinkMenu;
	public $categories;
	public $category;
	public $slug;
	public $drinkImages;


    public function componentDetails()
    {
        return [
            'name'        => 'Drink Menus',
            'description' => 'Adds a Drink Menu for display'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function onRun() {
		// if count is not 0 then make DB call
		if(DrinkCategory::count()){
			$this->categories = $this->page['categories'] = DrinkCategory::all();
			$this->category = $this->page['category'] = DrinkCategory::find(1)->first()->name;

			if(!DrinkItem::count()) {
				return;
			}

			$this->drinkMenu = $this->page['drinkMenu'] = DrinkCategory::find(1)->drink_items;
			$this->drinkImages = $this->page['drinkImages'] = DrinkItem::all();

		}
	}



	public function onGetDrinkMenu() {
		$category_id = post('category');

		$this->drinkMenu = $this->page['drinkMenu'] = DrinkCategory::find($category_id)->drink_items;
		$this->category = $this->page['category'] = DrinkCategory::find($category_id)->name;
		$this->slug = $this->page['slug'] = DrinkCategory::find($category_id)->slug;
	}

}
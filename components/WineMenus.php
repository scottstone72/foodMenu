<?php namespace Stone\FoodMenu\Components;

use Cms\Classes\ComponentBase;
use Stone\FoodMenu\Models\WineList;
use Stone\FoodMenu\Models\WineCategory;

class WineMenus extends ComponentBase
{

	public $wineMenu;
	public $categories;
	public $category;
	public $slug;
	public $wineImages;

    public function componentDetails()
    {
        return [
            'name'        => 'Wine Lists',
            'description' => 'Adds a Wine Menu List'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function onRun() {
		// if count is not 0 then make DB call
		if(WineCategory::count()){
			$this->categories = $this->page['categories'] = WineCategory::all();
			$this->category = $this->page['category'] = WineCategory::find(1)->first()->name;

			if(!WineList::count()) {
				return;
			}

			$this->wineMenu = $this->page['wineMenu'] = WineCategory::find(1)->wine_lists;
			$this->wineImages = $this->page['wineImages'] = WineList::all();

		}
	}


	public function onGetWineMenu() {
		$category_id = post('category');

		$this->wineMenu = $this->page['wineMenu'] = WineCategory::find($category_id)->wine_lists;
		$this->category = $this->page['category'] = WineCategory::find($category_id)->name;
		$this->slug = $this->page['slug'] = WineCategory::find($category_id)->slug;
	}

}
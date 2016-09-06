<?php namespace Stone\FoodMenu\Components;

use Cms\Classes\ComponentBase;
use Stone\FoodMenu\Models\FoodSubCategory;
use Stone\FoodMenu\Models\MenuItem;
use Stone\FoodMenu\Models\FoodCategory;


class FoodMenus extends ComponentBase
{

    public $menuItems;

    public $foodCategory;

    public $subCategory;

    public $categoryTitle;

    public $subCategoryTitle;

    public $categories = [];

    public $subCategories = [];

    public $categoryId;

    public $category;

    /**
     * Category Model
     * @var Instance
     */
    public function componentDetails()
    {
        return [
            'name' => 'Food Menus',
            'description' => 'Add a Food Menu for display.'
        ];
    }

    public function onRun()
    {
        // if count is not 0 then make DB call
        if (FoodCategory::count()) {
            // get list of all categories
            $this->categories = FoodCategory::all();
            // grab first category from categories
            $this->foodCategory = $this->categories[0];
            // set category name
            $this->categoryTitle = $this->foodCategory->name;
            // set food category id
            $this->categoryId = $this->foodCategory->id;
            // set subcategory title
            $this->subCategoryTitle = 'All ' . $this->categoryTitle . ' Items';
            // set all menu items that are associated with this category
            $this->menuItems = $this->foodCategory->menu_items;
            // set all subcategories for our buttons
            $this->subCategories = $this->setSubCategories($this->menuItems);
        }
    }

    /**
     * Ajax handler for Menu Buttons to set subcategories
     * Set properties on the object based on what the user has selected
     */
    public function onSubCategories()
    {
        // grab post from ajax call
        $this->categoryId = post('category');

        $this->foodCategory = FoodCategory::find($this->categoryId);
        $this->categoryTitle = $this->foodCategory->name;
        $this->subCategoryTitle = 'All ' . $this->categoryTitle . ' Items';

        $this->menuItems = $this->foodCategory->menu_items;

        $this->subCategories = $this->setSubCategories($this->menuItems);
    }

    /**
     * Ajax handler for Category Buttons to set menu items
     * Filters menu items based on sub categories
     */
    public function onGetFoodMenu()
    {
        // grab post from ajax call
        $sub_category_id = post('sub_category');
        $category_id = post('category');

        $this->subCategoryTitle = FoodSubCategory::find($sub_category_id)->subname;

        $this->menuItems = MenuItem::getMenuItems($category_id, $sub_category_id)->get();

    }

    /**
     * Sets the Category Id, SubCategory Id's and SubCategory Names into a structured array
     * @param $subcategories
     * @return array sub_categories
     */
    public function setSubCategories($menuItems)
    {
        foreach ($menuItems as $menuItem) {
            $subCategory = MenuItem::find($menuItem->id)->sub_categories->toArray();
            $this->subCategories[$this->categoryId][$subCategory[0]['id']] = $subCategory[0]['subname'];
        }

        return $this->subCategories;
    }
}
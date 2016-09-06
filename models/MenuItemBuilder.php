<?php namespace Stone\FoodMenu\Models;

//use Illuminate\Support\Facades\DB;
//use Stone\FoodMenu\Models\FoodCategory;
//use Stone\FoodMenu\Models\FoodSubCategory;
//use Stone\FoodMenu\Models\MenuItem;


class MenuItemBuilder
{
    private static $_instance;

    public $menuitems;

    public $categories;

    public $subcategories;

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

//        self::$_instance->categories = FoodCategory::all();
//        self::$_instance->subcategories = FoodSubCategory::all();
//        self::$_instance->menuitems = MenuItem::where('enable', 1)->get();
//        dd(self::$_instance);

        return self::$_instance;
    }

    public function getAllMenuItems()
    {
        $menuItems = DB::table('stone_foodmenu_menu_items')
            ->join('stone_foodmenu_food_categories_menu_items_pivot',
                'stone_foodmenu_menu_items.id',
                '=',
                'stone_foodmenu_food_categories_menu_items_pivot.menu_item_id')
            ->join('stone_foodmenu_food_sub_categories_menu_items_pivot',
                'stone_foodmenu_menu_items.id',
                '=',
                'stone_foodmenu_food_sub_categories_menu_items_pivot.menu_item_id')
            ->select('stone_foodmenu_menu_items.*',
                'stone_foodmenu_food_categories_menu_items_pivot.food_category_id',
                'stone_foodmenu_food_sub_categories_menu_items_pivot.food_sub_category_id')
            ->get();

        return $menuItems;
    }
}
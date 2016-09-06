<?php namespace Stone\FoodMenu\Models;

use Model;
use Stone\FoodMenu\Models\FoodCategory;

/**
 * MenuItem Model
 */
class MenuItem extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_menu_items';

    public $rules = [
        'name' => 'required',
        //        'food_categories' => 'required',
        //        'sub_categories' => 'required'
    ];

    public $customMessages = [
        'name.required' => 'A name is required.'
    ];

    protected $jsonable = [
        'price'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $belongsToMany = [
        'food_categories' => [
            'Stone\FoodMenu\Models\FoodCategory',
            'table' => 'stone_foodmenu_food_categories_menu_items_pivot',
        ],
        'sub_categories' => [
            'Stone\FoodMenu\Models\FoodSubCategory',
            'table' => 'stone_foodmenu_food_sub_categories_menu_items_pivot',
            'otherKey' => 'food_sub_category_id'
        ],
    ];

    /**
     * @var array Relations
     */
    public $attachOne = [
        'image' => ['System\Models\File']
    ];

    /**
     * Grab Food Category with Sub Category and there menu items
     * @param $query
     * @param string $categoryId
     * @param string $subcategoryId
     * @return $query
     */
    public function scopeGetMenuItems($query, $categoryId = '', $subcategoryId = '')
    {
        return $query->join('stone_foodmenu_food_categories_menu_items_pivot',
            'stone_foodmenu_menu_items.id', '=',
            'stone_foodmenu_food_categories_menu_items_pivot.menu_item_id')
            ->join('stone_foodmenu_food_sub_categories_menu_items_pivot',
                'stone_foodmenu_menu_items.id', '=',
                'stone_foodmenu_food_sub_categories_menu_items_pivot.menu_item_id')
            ->where('stone_foodmenu_food_categories_menu_items_pivot.food_category_id', $categoryId)
            ->where('stone_foodmenu_food_sub_categories_menu_items_pivot.food_sub_category_id', $subcategoryId)
            ->where('enable', 1);
    }
}
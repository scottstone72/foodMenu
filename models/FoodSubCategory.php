<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * FoodSubCategory Model
 */
class FoodSubCategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_food_sub_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
//    public $belongsToMany = [
//        'menu_items' => [
//            'Stone\FoodMenu\Models\MenuItem',
//            'table' => 'stone_food_categories_menu_items',
//            'order' => 'name'
//        ],
//    ];

    public $belongsToMany = [
        'menu_items' => [
            'Stone\FoodMenu\Models\MenuItem',
            'table' => 'stone_foodmenu_food_sub_categories_menu_items_pivot',
            'conditions' => 'enable = 1'
        ]
    ];
}
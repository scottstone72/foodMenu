<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * FoodCategory Model
 */
class FoodCategory extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_food_categories';

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
    public $belongsToMany = [
        'menu_items' => [
          'Stone\FoodMenu\Models\MenuItem',
          'table' => 'stone_foodmenu_food_categories_menu_items_pivot',
          'conditions' => 'enable = 1',
        ]
    ];

//        public $hasManyThrough = [
//          'menu_items' => [
//            'Stone\FoodMenu\Models\MenuItem',
//            'key'        => 'category_id',
//            'through' => 'Stone\FoodMenu\Models\FoodSubCategory',
//            'throughKey' => 'sub_category_id'
//          ],
//        ];
}
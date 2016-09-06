<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * DrinkCategory Model
 */
class DrinkCategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_drink_categories';

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
		'drink_items' => [
			'Stone\FoodMenu\Models\DrinkItem',
			'table' => 'stone_drink_categories_drink_items',
			'order' => 'name'
		],
	];

}
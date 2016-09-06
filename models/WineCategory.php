<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * WineCategory Model
 */
class WineCategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_wine_categories';

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
		'wine_lists' => [
			'Stone\FoodMenu\Models\WineList',
			'table' => 'stone_wine_categories_wine_lists',
			'order' => 'variety'
		],
	];

}
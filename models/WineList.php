<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * WineList Model
 */
class WineList extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_wine_lists';

	public $rules = [
		'variety' => 'required'
	];

	public $customMessages = [
		'variety.required' => 'A variety is required.'
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

	/**
	 * @var array Relations
	 */
	public $belongsToMany = [
		'wine_categories' => [
			'Stone\FoodMenu\Models\WineCategory',
			'table' => 'stone_wine_categories_wine_lists',
		],
	];

	/**
	 * @var array Relations
	 */
	public $attachOne = [
		'image' => ['System\Models\File']
	];

}
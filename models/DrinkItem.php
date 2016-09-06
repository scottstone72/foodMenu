<?php namespace Stone\FoodMenu\Models;

use Model;

/**
 * DrinkItem Model
 */
class DrinkItem extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'stone_foodmenu_drink_items';

	public $rules = [
		'name' => 'required'
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

    /**
     * @var array Relations
     */
	public $belongsToMany = [
		'drink_categories' => [
			'Stone\FoodMenu\Models\DrinkCategory',
			'table' => 'stone_drink_categories_drink_items',
			//			'order' => 'name'
		],
	];

	/**
	 * @var array Relations
	 */
	public $attachOne = [
		'image' => ['System\Models\File']
	];

}
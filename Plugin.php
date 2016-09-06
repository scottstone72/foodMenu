<?php namespace Stone\FoodMenu;

use Backend;
use System\Classes\PluginBase;

/**
 * FoodMenu Plugin Information File
 */
class Plugin extends PluginBase {

	/**
	 * Returns information about this plugin.
	 *
	 * @return array
	 */
	public function pluginDetails() {
		return [
			'name'        => 'Food Menu',
			'description' => 'Provides a Food Menu Items List',
			'author'      => 'Stone',
			'icon'        => 'icon-cutlery'
		];
	}

	public function registerComponents() {
		return [
			'Stone\FoodMenu\Components\FoodMenus' => 'foodMenu',
			'Stone\FoodMenu\Components\DrinkMenus' => 'drinkMenu',
			'Stone\FoodMenu\Components\WineMenus' => 'wineMenu',
		];
	}

	public function registerNavigation() {
		return [
			'foodmenu' => [
				'label'       => 'Food Menu',
				'url'         => Backend::url( 'stone/foodmenu/menuitems' ),
				'icon'        => 'icon-cutlery',
				'permissions' => [],
				'order'       => 500,

				'sideMenu' => [
//					'food_category' => [
//						'label'       => 'Food Category',
//						'icon'        => 'icon-puzzle-piece',
//						'url'         => Backend::url( 'stone/foodmenu/foodcategories' ),
//						'permissions' => [],
//
//					],
//                    'food_sub_category' => [
//                        'label'       => 'Food SubCategory',
//                        'icon'        => 'icon-puzzle-piece',
//                        'url'         => Backend::url( 'stone/foodmenu/foodsubcategories' ),
//                        'permissions' => [],
//
//                    ],
					'foodmenu' => [
						'label'       => 'Food Menu',
						'url'         => Backend::url( 'stone/foodmenu/menuitems' ),
						'icon'        => 'icon-cutlery',
						'permissions' => [],
					],
//					'drink_category' => [
//						'label'       => 'Drink Category',
//						'icon'        => 'icon-puzzle-piece',
//						'url'         => Backend::url( 'stone/foodmenu/drinkcategories' ),
//						'permissions' => [],
//
//					],
					'drinkmenu' => [
						'label'       => 'Drink Menu',
						'url'         => Backend::url( 'stone/foodmenu/drinkitems' ),
						'icon'        => 'icon-glass',
						'permissions' => [],
					],
//					'wine_category' => [
//						'label'       => 'Wine Category',
//						'icon'        => 'icon-puzzle-piece',
//						'url'         => Backend::url( 'stone/foodmenu/winecategories' ),
//						'permissions' => [],
//
//					],
					'winelist' => [
						'label'       => 'Wine Menu',
						'url'         => Backend::url( 'stone/foodmenu/winelists' ),
						'icon'        => 'icon-list',
						'permissions' => [],
					]
				]
			]
		];
	}

}

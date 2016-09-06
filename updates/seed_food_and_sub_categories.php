<?php

namespace Stone\FoodMenu\Updates;

use Seeder;
use Stone\FoodMenu\Models\FoodCategory;
use Stone\FoodMenu\Models\FoodSubCategory;
use Stone\FoodMenu\Models\MenuItem;


class SeedFoodAndSubCategories extends Seeder
{
    public function run()
    {
        $foodCategory1 = FoodCategory::create([
            'name' => 'Dinner Menu',
            'slug' => 'dinner-menu'
        ]);

        $foodCategory2 = FoodCategory::create([
            'name' => 'Lunch Menu',
            'slug' => 'lunch-menu'
        ]);

        $menuItems = [
          'Small Plates', 'Soups and Greens', 'Fresh Pasta',
            'Sandee\'s Sweets', 'Sandwiches and Burgers', 'Mains'
        ];

        foreach ($menuItems as $key => $item) {
            FoodSubCategory::create([
              'subname' => $item,
              'slug' => str_slug($item)
            ]);
        }
    }
}
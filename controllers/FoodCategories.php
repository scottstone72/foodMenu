<?php namespace Stone\FoodMenu\Controllers;

use BackendMenu;
use Stone\FoodMenu\Models\FoodCategory;
use Backend\Classes\Controller;

/**
 * Food Categories Back-end Controller
 */
class FoodCategories extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
//        'Backend.Behaviors.RelationController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
//    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
//        $this->formConfig = 'config_sub_category_form.yaml';

        BackendMenu::setContext('Stone.FoodMenu', 'foodmenu', 'foodcategories');
    }

    /** Delete items from the list. Ajax call **/
    public function onDelete() {
        /** Check if this is even set **/
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            /** cycle through each id **/
            foreach ($checkedIds as $objectId) {
                /** Check if there's an object actually related to this id
                 * Make sure you replace MODELNAME with your own model you wish to delete from.
                 **/
                if (!$object = FoodCategory::find($objectId))
                    continue; /** Screw this, next! **/
                /** Valid item, delete it **/
                $object->delete();
            }

        }
        /** Return the new contents of the list, so the user will feel as if
         * they actually deleted something
         **/
        return $this->listRefresh();
    }

//    public function index()
//    {
//        $this->asExtension('ListController')->index();
//        $this->bodyClass = 'compact-container';
//    }
//
//    public function onCreateForm()
//    {
//        $this->asExtension('FormController')->create();
//        return $this->makePartial('create_form');
//    }
//
//    public function onCreate()
//    {
//        $this->asExtension('FormController')->create_onSave();
//        return $this->listRefresh('food_sub_categories');
//    }
//
//    public function onUpdateForm()
//    {
//        $this->asExtension('FormController')->update(post('record_id'));
//        $this->vars['recordId'] = post('record_id');
//        return $this->makePartial('food_sub_categories');
//    }
//
//    public function onUpdate()
//    {
//        $this->asExtension('FormController')->update_onSave(post('record_id'));
//        return $this->listRefresh('food_sub_categories');
//    }
//
//    public function onDelete()
//    {
//        $this->asExtension('FormController')->update_onDelete(post('record_id'));
//        return $this->listRefresh('food_sub_categories');
//    }
}
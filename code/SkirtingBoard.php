<?php

class SkirtingBoard extends DataExtension
{

    public static $allowed_actions = array();

    private static $db = array(
        'Unit' => 'Varchar(7)'
    );

    private static $has_one = array();

    private static $has_many = array();

    public function contentControllerInit()
    {
        Requirements::css('components/font-awesome/css/font-awesome.min.css');
        Requirements::css(SKIRTING_BOARD_DIR . '/css/style.min.css');

        Requirements::javascript('components/jquery/jquery.min.js');
        Requirements::javascript(SKIRTING_BOARD_DIR . '/js/main.min.js');
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $this->extend('updateCMSFields', $fields);
        return $fields;
    }

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.Menu', TextField::create('Unit'));
    }


    public function getMenubyName($menu)
    {
        return SiteTree::get()->filter('URLSegment', $menu)->first();
    }


    public function SkirtingBoardMenu()
    {

        $menuName = (Translatable::get_current_locale() == "cy_GB") ? 'main-menu-cy-gb' : 'main-menu';
        $pageID = (Translatable::get_current_locale() == "cy_GB") ? 300 : 6;

        $arrayData = new ArrayData(array(
            'Menu' => SiteTree::get()->byID($pageID)
        ));
        return $arrayData->renderWith('Menus/SkirtingBoard');
    }
}
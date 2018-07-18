<?php

class SkirtingBoard extends DataExtension
{

	public static $allowed_actions = array();

	private static $db = array(
		'Unit' => 'Varchar(7)'
	);

	private static $has_one = array();

	private static $has_many = array();

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

	public function getMenubyName($menu){
		return SiteTree::get()->filter('URLSegment', $menu)->first();
	}

	public function SkirtingBoardMenu(){

		$arrayData = new ArrayData(array(
			'Menu'=> $this->getMenubyName('main-menu')
		));
		return $arrayData->renderWith('Menus/SkirtingBoard');
	}
}
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
}
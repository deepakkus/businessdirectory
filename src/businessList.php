<?php
class BusinessList
{
	function init()
	{

		add_action('init', array($this, 'list_data'));
	}
	function list_data()
	{

		$this->get_list_data();
	}

	/*
	Get form list data
	*/
	function get_list_data()
	{
		global $wpdb, $table_prefix;
		$table = $table_prefix . 'business';
		$res_data = $wpdb->get_results("SELECT * FROM $table");
		return $res_data;
	}
}
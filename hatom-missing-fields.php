<?php
/*
Plugin Name: hAtom Missing Fields
Plugin URI: http://www.seocom.es
Description: This plugin add missing hAtom fields in our wordpress installation.
Author: David Garcia
Version: 1.1.1
*/

class hatom_missing_fields {
	function hatom_missing_fields()
	{
		$this->__construct();
	}
	
	function __construct()
	{
		add_filter('init', array(&$this,'init') );
	}

	function init()
	{		
		ob_start(array(&$this,'buffer'));
	}

	function buffer($buffer)
	{
		if ( is_feed() )
		{
			return $buffer;
		}

		$this->add_updated($buffer);

		return $buffer;
	}	

	function add_updated( $buffer )
	{
		$buffer = str_replace('class="post-date"', 'class="post-date updated"', $buffer);
		$buffer = str_replace('class="entry-date"', 'class="entry-date updated"', $buffer);
		return $buffer;
	}

}

$hatom_missing_fields = new hatom_missing_fields();

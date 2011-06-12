<?php if(!defined('NOVA')) exit('Direct script access not permitted');

/**
 * Nova - Superlightweight MVC Framework for PHP
 * 
 * @license		Creative Commons Attribution-Noncommercial-Share Alike 2.0 UK
 * @author		Chris Granville
 * @link		http://chrispyslice.wordpress.com/
 * @email		v2t04 <at> students <dot> keele <dot> ac <dot> uk
 * 
 * @file		creation.sql
 * @version		1.0
 * @date		28/03/2011
 * 
 * Copyright (c) 2010 Chris Granville. All rights reserved.
 */

class Controller
{
	protected $load;
	protected $rsc;
	protected $view_data = array();

	public function __construct()
	{
		// Load in the view class
		$this->load = new Loader();

		// Set some view data, like the controller and method

		// Define the variables that we want to use later
		// Set to the default variables, so we can change it
		$controller = 'welcome';
		$method = 'index';

		// Check if we have  
		if(($slug = @array_filter(explode('/', $_SERVER['PATH_INFO']))) != null)
		{
			// We at least have a controller, so need to disable error reporting for accessing the method, if there is one
			$controller = $slug[1] ? $slug[1] : $controller;
			@$method = $slug[2] ? $slug[2] : $method;
		}

		$this->view_data['_controller'] = $controller;
		$this->view_Data['_method'] = $method;
	}
}
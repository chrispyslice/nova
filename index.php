<?php

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

error_reporting(-1);

define('NOVA', true);
define('APP_BASE', 'http://localhost/~chrispyslice/projects/nova/');

session_start();

/**
 * Routing
 */

// Define the variables that we want to use later
// Set to the default variables, so we can change it
$controller = 'welcome';
$method = 'index';

// Check if we have a URL slug
if(($slug = @array_filter(explode('/', $_SERVER['PATH_INFO']))) != null)
{
	// We at least have a controller, so need to disable error reporting for accessing the method, if there is one
	$controller = $slug[1] ? $slug[1] : $controller;
	@$method = $slug[2] ? $slug[2] : $method;
}

/**
 * Load libraries
 */

// File defining autoloaded resources
require_once './nova/conf/autoload.php';

// Load the common resources in autoload.php
foreach($autoload['always'] as $to_load)
	require_once './nova/libraries/' . $to_load . '.php';

// And now the page-specific ones
if(@$autoload[$controller])
	foreach($autoload[$controller] as $to_load)
		require_once './nova/libraries/' . $to_load . '.php';

// Load the base controller
if(file_exists('./application/models/' . $controller . '.php'))
	require_once './application/models/' . $controller . '.php';

// Load in the appropriate controllers
// Check if they exist first
if(file_exists('./application/controllers/' . $controller . '.php'))
	require_once './application/controllers/' . $controller . '.php';
else
	trigger_error("Controller " . $controller . " does not exist", E_USER_ERROR);

// At this point, we know that the Controller exists, so just load it
$obj = new $controller();
$obj->{$method}();
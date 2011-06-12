<?php if(!defined('NOVA')) exit("No access allowed");

/**
 * Nova - Superlightweight MVC Framework for PHP
 * 
 * @license		Creative Commons Attribution-Noncommercial-Share Alike 2.0 UK
 * @author		Chris Granville
 * @link		http://chrispyslice.wordpress.com/
 * @email		v2t04 <at> students <dot> keele <dot> ac <dot> uk
 * 
 * @file		view.php
 * @version		1.0
 * @date		28/03/2011
 * 
 * Copyright (c) 2010 Chris Granville. All rights reserved.
 */

$resources_directory = "./application/resources/";
$directories = array
(
	"images" 	=> "artwork",
	"styles"	=> "css",
	"scripts"	=> "scripts"
);

function get_script($script)
{
	return "<script type='text/javascript' src ='$this->$resources_directory'></script>";
}

function get_stylesheet($sheet)
{
	return "<link rel='stylesheet' type='text/css' href='" . APP_BASE . "/application/resources/css/$sheet' />";
}

function get_image($src, $alt, $title, $class = null, $id = null)
{
	return "<img src='" . APP_BASE . "/application/resources/artwork/$src' alt='$alt' title='$title' class='$class' id='$id' />";
}
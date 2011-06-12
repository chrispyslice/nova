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

// An array of libraries to load on various pages, as well as an "always include section"

$autoload = array(
	'always' => array('common', 'model', 'loader', 'controller')
);
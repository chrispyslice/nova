<?php if(!defined('NOVA')) exit('Direct script access not permitted');

/**
 * Nova - Superlightweight MVC Framework for PHP
 * Base Model
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

class Model
{
	protected $db;

	public function __construct()
	{
		//$this->db = new OCI('username', 'password');
		//$this->db = new mysqli(blah);
		//etc. Needs to be an object!
	}
}
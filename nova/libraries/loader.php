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

class Loader
{
	private $default_template = "idea";
	
	public function view($view, $view_data)
	{
		return $this->_view($view, $view_data);
	}

	public function template($view, $view_data, $template = "dynamic")
	{
		$view_data['contents'] = $this->_view($view, $view_data, true);
		return $this->_view('_templates/' . $template, $view_data);
	}

	private function _view($v, $args, $return = false)
	{
		if(!file_exists('./application/views/' . $v . '.php')) trigger_error('Unable to load file ./views/' . $v . '.php', E_USER_ERROR);

		extract($args);

		ob_start();

		include('./application/views/' . $v . '.php');

		if($return)
		{
			$buffer = @ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}

		ob_end_flush();
	}
}
<?php if(!defined('NOVA')) exit('Direct script access not permitted');

function anchor_url($page)
{
	return APP_BASE . '/index.php/' . $page;
}

function redirect($to)
{
	header('Location: ' . anchor_url($to));
}

function get_script($script)
{
	return "<script type='text/javascript' src ='" . APP_BASE . "/application/resources/scripts/$script'></script>\n";
}

function get_stylesheet($sheet)
{
	return "<link rel='stylesheet' type='text/css' href='" . APP_BASE . "/application/resources/css/$sheet' />\n";
}

function get_image($src, $alt, $title, $class = null, $id = null, $style = null)
{
	return "<img src='" . APP_BASE . "/application/resources/artwork/$src' alt='$alt' title='$title' class='$class' id='$id' style='$style' />\n";
}
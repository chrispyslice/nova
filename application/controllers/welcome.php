<?php

class welcome extends controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('welcome', array());
	}
}
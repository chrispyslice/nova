
<?php if(!defined('NOVA')) exit('Direct script access not permitted');

/**
 * Nova - Superlightweight MVC Framework for PHP
 * Oracle Database Abstraction Layer
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

class OCI
{
	private $username;
	private $password;
	private $host;
	private $_handle;
	private $_conn;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;

		$this->_connect();
	}

	public function select_array($sql)
	{
		$this->_parse($sql);

		$array = array();
		while(($row = oci_fetch_array($this->_handle, OCI_ASSOC + OCI_RETURN_NULLS))) $array[] = $row;
		$this->_reset();
		return !empty($array) ? $array : false;
	}

	public function count_rows($sql)
	{
		$this->_parse($sql);
		
		$r = oci_fetch_array($this->_handle);
		$this->_reset();

		return $r[0];
	}

	public function insert($sql)
	{
		$this->_parse($sql);
		$this->_reset();
	}

	private function _connect()
	{
		//echo 'Connecting with username ' . $this->username . ' , password ' . $this->password; 
		$this->_conn = oci_connect($this->username, $this->password);
		if(!$this->_conn) $this->_error(oci_error());
	}

	private function _parse($sql)
	{
		$this->_handle = oci_parse($this->_conn, $sql);
		if(!$this->_handle)
		{
			$e = oci_error();
			trigger_error(htmlentities($e['message']), E_USER_ERROR);
		}

		oci_execute($this->_handle);
	}

	private function _reset()
	{
		oci_free_statement($this->_handle);
	}

	private function _error($handler)
	{
		trigger_error(htmlentities($handler['message'], ENT_QUOTES), E_USER_ERROR);
	}

	public function __destroy()
	{
		oci_close();
	}
}
<?php

class Category extends CI_Model
{
	protected $db;
	/**
	 * Category constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
}

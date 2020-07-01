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

	public function getMainCategories()
	{
		$query = $this->db->select('id, name')->get_where('categories', array('id' => null));
		return $query->result;
	}

	public function getChildren($parentID)
	{
		$query = $this->db->select('id, name')->get_where('categories', array('parent_id' => $parentID));
		return $query->result;
	}
}

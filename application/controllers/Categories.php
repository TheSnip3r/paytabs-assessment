<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("category");
	}

	public function index()
	{
		$mainCategories = $this->category->getMainCategories();
		$this->load->view('categories/index', compact("mainCategories"));
	}

	public function getCategoriesByParentID($parentID)
	{
		$childrenCategories = $this->category->getChildren($parentID);
		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(compact("childrenCategories")));
	}
}

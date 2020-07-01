<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_categories extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'parent_id' => array(
				'type' => 'INT',
				'null' => TRUE,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('categories');

		$this->insertData();
	}

	public function down()
	{
		$this->dbforge->drop_table('categories');
	}

	public function insertData()
	{
		$lines = file(APPPATH."migrations/categories.sql");
		foreach ($lines as $line) {
			$line = trim($line);
			$this->db->query($line);
		}
	}
}

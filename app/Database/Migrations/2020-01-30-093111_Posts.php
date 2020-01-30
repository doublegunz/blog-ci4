<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE,
			],
			'content' => [
				'type' => 'TEXT',
				'null' => FALSE
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			],
			'status' => [
				'type' => 'INT',
				'constraint' => 1,
				'null' => FALSE
			],
			'created_at' => [
				'type' => 'datetime',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => TRUE
			],
			'deleted_at' => [
				'type' => 'datetime',
				'null' => TRUE
			]
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}

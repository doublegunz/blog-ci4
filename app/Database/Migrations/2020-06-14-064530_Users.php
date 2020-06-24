<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
				'unique' => TRUE
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'created_at' => [
				'type' => 'datetime',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => TRUE
			]
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

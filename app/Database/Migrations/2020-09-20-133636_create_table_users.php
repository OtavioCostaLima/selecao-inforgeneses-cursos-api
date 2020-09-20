<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
	public function up()
	{

		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'first_name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'last_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
		],
		'password'       => [
			'type'           => 'VARCHAR',
			'constraint'     => '100',
	],
			'created_at datetime default current_timestamp'
	]);

	$this->forge->addKey('id', true);
	$this->forge->createTable('users');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

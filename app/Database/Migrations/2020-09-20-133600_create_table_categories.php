<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCategories extends Migration
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
			'description' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'created_at datetime default current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('cotegories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('cotegories');

	}
}

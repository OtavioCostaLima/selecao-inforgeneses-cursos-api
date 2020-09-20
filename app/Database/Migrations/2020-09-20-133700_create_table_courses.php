<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCourses extends Migration
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
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'description' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'url_image' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'price' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
				'null' => FALSE,
				'default' => 0.00
			],
			'cotegory_id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'null'           => true
		],
			'created_at datetime default current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('cotegory_id','cotegories','id','CASCADE','CASCADE');
		$this->forge->createTable('courses');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('courses');
	}
}

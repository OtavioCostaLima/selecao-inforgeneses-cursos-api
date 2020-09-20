<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserCourse extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'user_id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'null'           => true
		],
		'course_id' => [
			'type'           => 'INT',
			'constraint'     => 5,
			'unsigned'       => true,
			'null'           => true
	],
			'created_at datetime default current_timestamp'
		]);


		$this->forge->addKey('user_id', TRUE);
		$this->forge->addKey('course_id', TRUE);
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('course_id','courses','id');


		
		$this->forge->createTable('user_course');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user_course');
	}
}

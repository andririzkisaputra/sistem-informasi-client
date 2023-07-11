<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'nim'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'jurusan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'alamat'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
            'validasi'      => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('mahasiswa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}

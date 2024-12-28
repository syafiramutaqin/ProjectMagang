<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        // Membuat tabel 'obat'
        $this->forge->addField([
            'id'                => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_obat'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'nama_golongan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama_obat'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'barang_masuk'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'        => 0,
            ],
            'barang_keluar'     => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'        => 0,
            ],
            'stock_akhir'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'        => 0,
            ],
            'target'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'        => 0,
            ],
            'pic_by'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'notes'             => [
                'type'           => 'TEXT',
                'null'           => true,  // Agar bisa kosong jika tidak ada catatan
            ],
            'created_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,  // Agar otomatis terisi jika diperlukan
            ],
            'updated_at'        => [
                'type'           => 'DATETIME',
                'null'           => true,  // Agar otomatis terisi jika diperlukan
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('obat');
    }

    public function down()
    {
        // Menghapus tabel 'obat' jika migrasi dibatalkan
        $this->forge->dropTable('obat');
    }
}
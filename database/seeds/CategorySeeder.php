<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_kategori' => 'Buku'],
            ['nama_kategori' => 'Pensil'],
            ['nama_kategori' => 'Solasi'],
        ];
        DB::table('tb_kategori')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_unit' => 'Pax'],
            ['nama_unit' => 'Unit'],
        ];
        DB::table('tb_unit')->insert($data);
    }
}

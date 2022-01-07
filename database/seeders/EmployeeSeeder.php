<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama' => 'Syaiful Maulana',
            'jenisKelamin' => 'Laki - Laki',
            'notelpon' => '08214515459',
        ]);
    }
}

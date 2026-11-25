<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biodata;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biodata::updateOrCreate(
            ['nim' => '24010110170'],
            [
                'nama' => 'MAEJESTIE WAHYU PRAJA PATI',
                'peran' => 'master',
                'deskripsi' => 'mengerjakan frondtand',
                'foto' => '1795594393_6b06989955f02.jpeg',
            ]
        );

        Biodata::updateOrCreate(
            ['nim' => '24010110167'],
            [
                'nama' => 'FATHURRAHMAN',
                'peran' => 'pegawai',
                'deskripsi' => 'mengerjakan back and',
                'foto' => '1795597362_6b06a432a3da4.jpeg',
            ]
        );
    }
}

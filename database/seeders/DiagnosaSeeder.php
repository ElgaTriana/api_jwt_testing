<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_icd10' => 'A00', 'nama_diagnosa' => 'Cholera'],
            ['kode_icd10' => 'A09', 'nama_diagnosa' => 'Diarrhoea and gastroenteritis of presumed infectious origin'],
            ['kode_icd10' => 'B20', 'nama_diagnosa' => 'Human immunodeficiency virus [HIV] disease'],
            ['kode_icd10' => 'E11', 'nama_diagnosa' => 'Type 2 diabetes mellitus'],
            ['kode_icd10' => 'I10', 'nama_diagnosa' => 'Essential (primary) hypertension'],
            ['kode_icd10' => 'J18', 'nama_diagnosa' => 'Pneumonia, organism unspecified'],
            ['kode_icd10' => 'K35', 'nama_diagnosa' => 'Acute appendicitis'],
            ['kode_icd10' => 'N39.0', 'nama_diagnosa' => 'Urinary tract infection, site not specified'],
            ['kode_icd10' => 'O80', 'nama_diagnosa' => 'Single spontaneous delivery'],
            ['kode_icd10' => 'Z00.0', 'nama_diagnosa' => 'General medical examination']
        ];

        DB::table('diagnosas')->insert($data);
    }
}

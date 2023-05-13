<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'uniqueid'=>str()->random(7),
                'unit_name'=>'Kilograms',
                'unit_abbreviation'=>'KG',
                'status'=>1,
                'created_by'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'uniqueid'=>str()->random(7),
                'unit_name'=>'Carton',
                'unit_abbreviation'=>'Carton',
                'status'=>1,
                'created_by'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'uniqueid'=>str()->random(7),
                'unit_name'=>'Sachet',
                'unit_abbreviation'=>'Sct',
                'status'=>1,
                'created_by'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]
        ];
        DB::table('units')->insert($units);
    }
}

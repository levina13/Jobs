<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use App\Models\province;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_perusahaans')->insert(
            [
            'jenis_perusahaan'=>'Accounting'
            ],
            [
                'jenis_perusahaan' => 'Marketing'
            ],
            [
                'jenis_perusahaan' => 'Sales'
            ],
            [
                'jenis_perusahaan' => 'Finance'
            ],
            [
                'jenis_perusahaan' => 'International Business'
            ],
            [
                'jenis_perusahaan' => 'Human Resources'
            ],
            [
                'jenis_perusahaan' => 'Health Services administration'
            ],
            [
                'jenis_perusahaan' => 'Management Information System'
            ],
            [
                'jenis_perusahaan' => 'Technology'
            ],
            
        );
        // Provinsi
        $ProvinceCsvFile = fopen(base_path("database/data/provinsi.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($ProvinceCsvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                province::create([
                    "id" => $data['0'],
                    "province" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($ProvinceCsvFile);

        // Kota
        $CityCsvFile = fopen(base_path("database/data/city.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($CityCsvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                city::create([
                    "id" => $data['0'],
                    "city" => $data['2'],
                    "id_province"=>$data[1]
                ]);
            }
            $firstline = false;
        }

        fclose($CityCsvFile);

        // Education
        DB::table('educations')->insert(
            [
                'education' => 'Elementary School'
            ],
            [
                'education' => 'Junior High School'
            ],
            [
                'education' => 'Senior High School'
            ],
            [
                'education' => 'Bachelor Degree'
            ],
            [
                'education' => 'Master Degree'
            ],
            [
                'education' => 'Other'
            ],
        );

        // Contract
        DB::table('contracts')->insert(
            [
                'contract'=>'Freelance'
            ],
            [
                'contract' => 'Full Time'
            ],
            [
                'contract' => 'Part Time'
            ]
        );

    }
}

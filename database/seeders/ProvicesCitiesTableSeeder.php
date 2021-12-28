<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ProvicesCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinsi) {
            Province::create([
                'id' => $provinsi['province_id'],
                'name' => $provinsi['province']
            ]);

            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinsi['province_id'])->get();
            foreach ($daftarKota as $kota) {
                City::create([
                    'id' => $kota['city_id'],
                    'province_id' => $provinsi['province_id'],
                    'name' => $kota['city_name']
                ]);
            }
        }
    }
}

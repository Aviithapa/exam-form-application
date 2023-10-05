<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jsonData = '[
  {
    "province": "Koshi Pradesh",
    "districts": [
      "Bhojpur",
      "Dhankuta",
      "Ilam",
      "Jhapa",
      "Khotang",
      "Morang",
      "Okhaldhunga",
      "Panchthar",
      "Sankhuwasabha",
      "Solukhumbu",
      "Sunsari",
      "Taplejung",
      "Terhathum",
      "Udayapur"
    ]
  },
  {
    "province": "Madhesh Pradesh",
    "districts": [
      "Bara",
      "Parsa",
      "Dhanusa",
      "Mahottari",
      "Rautahat",
      "Saptari",
      "Sarlahi",
      "Siraha"
    ]
  },
  {
    "province": "Bagmati Pradesh",
    "districts": [
      "Bhaktapur",
      "Chitwan",
      "Dhading",
      "Dolakha",
      "Kathmandu",
      "Kavrepalanchok",
      "Lalitpur",
      "Makwanpur",
      "Nuwakot",
      "Ramechhap",
      "Rasuwa",
      "Sindhuli",
      "Sindhupalchok"
    ]
  },
  {
    "province": "Gandaki Pradesh",
    "districts": [
      "Baglung",
      "Gorkha",
      "Kaski",
      "Lamjung",
      "Manang",
      "Mustang",
      "Myagdi",
      "Nawalparasi (East)",
      "Nawalparasi (West)",
      "Parbat",
      "Syangja",
      "Tanahun"
    ]
  },
  {
    "province": "Lumbini Pradesh",
    "districts": [
      "Arghakhanchi",
      "Banke",
      "Bardiya",
      "Dang Deukhuri",
      "Rukum (East)",
      "Gulmi",
      "Kapilvastu",
      "Palpa",
      "Pyuthan",
      "Rolpa",
      "Rupandehi"
    ]
  },
  {
    "province": "Karnali Pradesh",
    "districts": [
      "Dailekh",
      "Dolpa",
      "Humla",
      "Jajarkot",
      "Jumla",
      "Kalikot",
      "Mugu",
      "Salyan",
      "Surkhet",
      "Rukum (West)"
    ]
  },
  {
    "province": "Sudurpashchim Pradesh",
    "districts": [
      "Achham",
      "Baitadi",
      "Bajhang",
      "Bajura",
      "Dadeldhura",
      "Darchula",
      "Doti",
      "Kailali",
      "Kanchanpur"
    ]
  }
]';

        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray  as $data) {
            $province = DB::table('province')->where('name', $data['province'])->first();

            if ($province) {
                $districts = $data['districts'];

                foreach ($districts as $district) {
                    DB::table('district')->insert([
                        'name' => $district,
                        'province_id' => $province->id,
                    ]);
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annonces = [];
        $faker = Faker::create();
        $types = ['appartement', 'maison', 'villa', 'magasin', 'terrain'];
        $citys = ['Casablanca','Fes','Marrakech','Tangier','Meknes','Agadir'];

        foreach(range(1,10) as $index){
          $annonce = [
            'titre' => "Vente de ".($type = $faker->randomElement($types))." dans ".$city= $faker->randomElement($citys),
            'description' => $faker->paragraph(2),
            'type' => $type,
            'ville' => $city,
            'superficie' => $faker->numberBetween(80,300),
            'neuf' => $faker->boolean(80),
            'prix' => $faker->randomNumber(2, true) * 100000,
            'created_at' => now(),
            'updated_at' => now()
          ];

          $annonces[]= $annonce;
        }

        DB::table('annonces')->delete();
        DB::table('annonces')->insert($annonces);

    }
}

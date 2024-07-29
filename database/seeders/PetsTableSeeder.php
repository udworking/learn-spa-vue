<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;
class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++){
            Pet::create([
                'name' => 'Fish' ."$i",
                'f_cost' => 1,
                'category' => 1,
                'caution_flg' => 0,
                'np_flg' => 0,
                'display' => 1,
            ]);
        }
    }
}

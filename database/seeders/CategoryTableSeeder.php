<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => 1,
            'phylum' => 'karasin',
            'note' => 'Like a neontetra',
        ]);
        Category::create([
            'category' => 2,
            'phylum' => 'Cypriniformes',
            'note' => 'Like a barb',
        ]);
        Category::create([
            'category' => 3,
            'phylum' => 'Killifish',
            'note' => 'Like a guppy',
        ]);
        Category::create([
            'category' => 4,
            'phylum' => 'Gourami',
            'note' => 'Like a dwarf gourami',
        ]);
        Category::create([
            'category' => 5,
            'phylum' => 'Others',
            'note' => 'Like a calfish',
        ]);
    }
}

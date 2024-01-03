<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Fiksi']);
        Category::create(['name' => 'Non-Fiksi']);
        Category::create(['name' => 'Sains Populer']);
        Category::create(['name' => 'Pengembangan Diri']);
        Category::create(['name' => 'Buku Anak-anak']);
    }
}

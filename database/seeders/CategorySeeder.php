<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ["name" => "Maternity", "description" => "Capturing the grace of motherhood", "created_by" => 1],
            ["name" => "Family", "description" => "Being part of a family means smiling for photos", "created_by" => 1],
            ["name" => "Siblings", "description" => "A sibling is the lens through which you see your childhood", "created_by" => 1],
            ["name" => "Infant", "description" => "It is the nature of babies to be in the bliss", "created_by" => 1],
            ["name" => "Newborn", "description" => "There will never be a day like the day your baby is born", "created_by" => 1],
            ["name" => "Toddler", "description" => "They dance before they learn there is anything that isn't music", "created_by" => 1],
        ]);
    }
}

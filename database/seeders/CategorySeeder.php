<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $categories = ['elettronica', 'abbigliamento', 'salute e bellezza', 'casa e giardinaggio', 'giocattoli', 'sport', 'animali domestici', 'libri e riviste', 'accessori', 'motori'];
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

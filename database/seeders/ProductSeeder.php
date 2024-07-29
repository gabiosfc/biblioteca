<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Produto A',
            'description' => 'Descrição do produto A',
            'price' => 15.63,
            'stock' => 12
        ]);
        Product::create([
            'name' => 'Produto B',
            'description' => 'Descrição do produto B',
            'price' => 15.63,
            'stock' => 12
        ]);
    }
}

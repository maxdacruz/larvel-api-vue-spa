<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allCateg = ['Voiture', 'Ordinateur', 'Vetements', 'Autre', 'Music', 'Divertisement', 'Livres'];

        for ($item = 0; $item < count($allCateg); $item++) {
            $cat = new Category;
            $cat->name = $allCateg[$item];
            $cat->save();
        }

        /*  $categ = App\Category::all();

        App\Annonce::all()->each(function ($product) use ($categ) {
            $product->category()->attach(
                $categ->random(rand(1, 1))->pluck('id')->toArray()
            );
        }); */
    }
}

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
        $allCateg = [['name' => 'Vehicules', 'category_id' => null], ['name' => 'Location', 'category_id' => null], ['name' => 'Emploi', 'category_id' => null], ['name' => 'Mode', 'category_id' => null], ['name' => 'Hi-Tech', 'category_id' => null], ['name' => 'Habitation', 'category_id' => null], ['name' => 'Loisirs et Divertissement', 'category_id' => null], ['name' => 'Autre', 'category_id' => null], ['category_id' => 1, 'name' => 'voiture'], ['category_id' => 1, 'name' => 'moto'], ['category_id' => 1, 'name' => 'caravane'], ['category_id' => 1, 'name' => 'accesoires'], ['category_id' => 1, 'name' => 'pieces'], ['category_id' => 1, 'name' => 'velos'], ['category_id' => 2, 'name' => 'Maison'], ['category_id' => 2, 'name' => 'Appartement'], ['category_id' => 2, 'name' => 'Garage'], ['category_id' => 3, 'name' => 'emploi'], ['category_id' => 3, 'name' => 'cours particuliers'], ['category_id' => 3, 'name' => 'services'], ['category_id' => 4, 'name' => 'vetements'], ['category_id' => 4, 'name' => 'chausures'], ['category_id' => 4, 'name' => 'accessoires'], ['category_id' => 4, 'name' => 'bijoux'], ['category_id' => 4, 'name' => 'vetements bebe'], ['category_id' => 5, 'name' => 'Images & sons'], ['category_id' => 5, 'name' => 'smartphone'], ['category_id' => 5, 'name' => 'jeux video'], ['category_id' => 5, 'name' => 'informatique'], ['category_id' => 6, 'name' => 'electromenager'], ['category_id' => 6, 'name' => 'mobilier'], ['category_id' => 6, 'name' => 'decoration'], ['category_id' => 6, 'name' => 'jardinage'], ['category_id' => 6, 'name' => 'Linge'], ['category_id' => 7, 'name' => 'Films'], ['category_id' => 7, 'name' => 'Musique'], ['category_id' => 7, 'name' => 'livres'], ['category_id' => 7, 'name' => 'jeux & jouet'], ['category_id' => 7, 'name' => 'forme é detente'], ['category_id' => 7, 'name' => 'sport'], ['category_id' => 7, 'name' => 'animaux']];

        Category::insert($allCateg);

        /*  $categ = App\Category::all();

        App\Annonce::all()->each(function ($product) use ($categ) {
            $product->category()->attach(
                $categ->random(rand(1, 1))->pluck('id')->toArray()
            );
        }); */
    }
}

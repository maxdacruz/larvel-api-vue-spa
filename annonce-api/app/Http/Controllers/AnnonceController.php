<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\Category;
use App\AnnonceImage;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Annonce as AnnonceResource;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categ = null)
    {
        if ($categ == null) {

            $annonces = Annonce::latest()->paginate(20);

            return AnnonceResource::collection($annonces);
        } else {

            //retourne tous les annonces des categorye principale et de ces enfants c'est ouf
            //https://laracasts.com/discuss/channels/laravel/get-all-products-from-parent-category-and-its-all-sub-categories

            $category = Category::with(['annonces', 'subAnnonces'])->find(3);
            $allProducts = $category->annonces->merge($category->subAnnonces);

            return $allProducts;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $annonce =  Annonce::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'user_id' => 11, //Auth::user()->id,
            'category_id' => 1 //$request->get('category')

        ]);

        /*  if ($annonce->save()) {
            return response()->json(['succes' => 'Annonce saved']);
        } else {
            return response()->json(['error' => 'their was a mistake saving']);
        } */

        $images = $request->images;

        foreach ($images as $image) {
            $imagePath = Storage::disk('uploads')->put('/annonce/' . $annonce->id, $image);
            AnnonceImage::create([
                'annonce_id' => $annonce->id,
                'image_path' => "/uploads/" . $imagePath
            ]);
        }

        return response()->json(['error' => false, 'data' => $request]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return new AnnonceResource(Annonce::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

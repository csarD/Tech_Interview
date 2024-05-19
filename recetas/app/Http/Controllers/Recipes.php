<?php

namespace App\Http\Controllers;

use App\Models\RecipesxIngredients;
use http\Client\Response;
use Illuminate\Http\Request;

class Recipes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Info=\App\Models\Recipes::all();
        return \Response::json(['Recetas'=>$Info]);
    }
    public function ReqIngredients(int $id)
    {

        $ingredients=[];
        $quantities=[];
        $Info=RecipesxIngredients::where('recipe_id',$id)->get();
        foreach($Info as $key=>$item){
            $ingredients[$key]=$item->ingredient_id;
            $quantities[$key]=$item->quantity;
        }

        return \Response::json(['Ingredients'=>$ingredients,'Required'=>$quantities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

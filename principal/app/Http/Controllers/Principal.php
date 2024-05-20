<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Principal extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Http::get(env('API_ORDERS','192.168.0.101:84').'/api/all');
    }
    public function Bodega()
    {
        return Http::get(env('API_INGREDIENTS','192.168.0.101:83').'/api/Ingredients');
    }
    public function Pedidos()
    {
        return Http::get(env('API_INGREDIENTS','192.168.0.101:83').'/api/Market');
    }
    public function Recetas()
    {
        return Http::get(env('API_RECIPES','192.168.0.101:82').'/api/Recipes');
    }
    public function TotalOrders()
    {
        return Http::post(env('API_ORDERS','192.168.0.101:84').'/api/all');
    }
    public function validate()
    {
        return Http::post(env('API_ORDERS','192.168.0.101:84').'/api/validateStatus');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            //se crea una nueva orden con una receta aleatoria
            $infoOrden= Http::post(env('API_ORDERS','192.168.0.101:84').'/api/newOrder');

            //se recuperan los ingredientes y las cantidades a utilizar
            $InfoIngredientes=Http::post(env('API_RECIPES','192.168.0.101:82').'/api/required/'.$infoOrden->json('recipe_id'));

            //se validan los ingredientes y se compran los faltantes
            $info= Http::post(env('API_INGREDIENTS','192.168.0.101:83').'/api/Ingredients',[
                'Ingredients' => $InfoIngredientes->json('Ingredients'),
                'Required'=> $InfoIngredientes->json('Required')
            ]);

            return redirect()->route('ActiveOrders');
        }catch (\Exception $e){
            return $e->getMessage();
        }

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

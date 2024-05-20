<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\MarketOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ingredient::all();
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
        $data="";
        $ingredients=$request->get("Ingredients");
        $Req=$request->get("Required");
        foreach ($ingredients as $key=>$ingredient) {
           $Info= Ingredient::where('id',$ingredient)->first();

            if($Info->units <$Req[$key]){
             $this->buy($Info->name,$Req[$key]);

            }else{
                $Info->units-=$Req[$key];
                $Info->save();
            }

        }
        return $data;
    }
    public function buy(string $name,int $requireds)
    {
        $valid=false;
        $quantity=0;
        while($valid==false){
            try{
                $response = Http::get('https://recruitment.alegra.com/api/farmers-market/buy', [
                    'ingredient' => $name

                ]);
                if($response->successful()){
                    $quantity=$response->json('quantitySold');
                    $Order= new MarketOrder();
                    $Info= Ingredient::where('name',$name)->first();
                    $Info->units+=$quantity;
                    $Info->save();
                    $Order->ingredient_id = $Info->id;
                    $Order->units=$quantity;
                    $Order->save();
                    if($quantity>0 && $Info->units>=$requireds) {
                        $valid = true;
                        $Info->units-=$requireds;
                        $Info->save();
                    }

                }else{
                    throw new Exception('El mercado estaba cerrado. No se pueden realizar compras');
                }
            }catch (Exception $e){
                return $e;
            }


        }
        return $quantity;

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

<?php

namespace App\Http\Controllers;

use App\Models\MarketOrder;
use Illuminate\Http\Request;

class Market extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MarketOrder::select('Ingredients.name','OrdersMarket.units','OrdersMarket.created_at','OrdersMarket.id')
            ->join('Ingredients','Ingredients.id','=','OrdersMarket.ingredient_id')->get();}

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
    public function show(MarketOrder $marketOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MarketOrder $marketOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarketOrder $marketOrder)
    {
        //
    }
}

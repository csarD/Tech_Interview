<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrdersxRecipes;
use Illuminate\Http\Request;

class Orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::select('*')
            ->join('OrdersxRecipes', 'order_id', '=', 'Orders.id')
            ->join('Recipes', 'OrdersxRecipes.recipe_id', '=', 'Recipes.id')
            ->where('Orders.status', '=', 'Active')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        $order->Status='Active';
        $order->save();

        $recipexOrder= new OrdersxRecipes();
        $recipexOrder->order_id=$order->id;
        $recipexOrder->recipe_id=rand(1,6);
        $recipexOrder->quantity=1;
        $recipexOrder->save();
        return redirect()->route('allOrders');
    }
    public function Status()
    {
        $info=Order::select('Orders.*','Recipes.duration')
            ->join('OrdersxRecipes', 'order_id', '=', 'Orders.id')
            ->join('Recipes', 'OrdersxRecipes.recipe_id', '=', 'Recipes.id')
            ->where('Orders.Status', '=', 'Active')
            ->get();
        $currentTimestamp = time();
        foreach ($info as $order) {
            $updates = Order::where('id', $order->id)->first();
            if($currentTimestamp-strtotime($order->created_at)>$order->duration){
                $updates->status='Inactive';
                $updates->save();
            }

        }


        return redirect()->route('allOrders');
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

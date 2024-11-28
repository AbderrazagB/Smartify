<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $cartItem = Cart::findOrFail($id);
        $product = Produit::findOrFail($cartItem->produit_id);
        $request->validate([
            'qnt',
        ]);
        $input = $request['qnt'];
        if ( $product->qntStock > $input ){
            $cartItem->update($request->only(['qnt']));
            return redirect()->route('Cart')
        ->with('success','Quantity changed');
        }
        else{
            return redirect()->route('Cart')
        ->with('success','Quantity is more than our stock!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

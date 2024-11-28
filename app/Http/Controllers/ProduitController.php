<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Cart;
use App\Models\User;
use Redirect;
use Auth;

use Illuminate\Http\Request;

class ProduitController extends Controller
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
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
    public function purchase(){
        return view('product.purchase');
    }
    public function search ()
    {
        if (isset($_GET['query'])){
        $search_text = $_GET['query'];
        $search_category = $_GET['category'];
        if ($search_category == 'All' || $search_category == '1' ){
            $search_category='';
        }
        $products = Produit::where(strtolower('name') , 'LIKE' , '%'.strtolower($search_text).'%')->where('category' , 'LIKE' , '%'.strtolower($search_category).'%')->paginate(8);
        return view('product.search',compact('products'))
                ->with('i', (request()->input('page',1) -1) * 8);

        }

    }

    public function cart()
{   if (Auth::user()->isAdmin)
    {
        return redirect('home');
    }
    $products = Cart::where('state',0)->with('produit')->get()->where('user_id',auth()->user()->id);
    return view('product.cart')->with('products' , $products)->with('cartIds', $products->pluck('id')->toArray());
}

public function addCart($id)
{
    $product = Produit::findOrFail($id);
    $cartItem = Cart::where('state',0)->where('produit_id', $id)->where('user_id',auth()->user()->id)->first();
    if ($cartItem ) {
        $cartItem->increment('qnt');
    } else {
        Cart::create([
            'user_id' => Auth::user()->id,
            'produit_id' => $product->id,
            'qnt' => 1,
        ]);
    }




     return redirect()->route('Cart');
}
public function destroyCart($id)
    {
        $cart = Cart::find( $id );
        $cart->delete();
        return redirect()->route('Cart')
        ->with ('success','Product removed from cart.');
    }

}

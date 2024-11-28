<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProduitController;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Cart;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {   if (Auth::user()->isAdmin)
        {
            $purchases = Order::latest()->get();
            return view('product.managePurchases')->with('purchases' , $purchases);
        }
        $purchases = Order::where('user_id',auth()->user()->id)->latest()->get();
        return view('product.managePurchases')->with('purchases' , $purchases);
    }

    public function purchase(Request $request)
{
    $sum = 0;
    $cartIds =request()->input('cart_ids', []);
    $order = Order::create([
        'user_id' => Auth::user()->id,
        'total_price' => 0,
    ]);

    $order->update([
        'ref_ord' => 'Ref#'.$order->id,
    ]);

    foreach ($cartIds as $cartId) {
        $cart = Cart::find($cartId);
        $sum = $sum + $cart->qnt * $cart->produit->price;
        $cart->update([
            'ord_ref' =>$order->ref_ord,
            'state' =>1,
        ]);
    }
    $order->update([
        'total_price' => $sum,
    ]);
    return view('product.billingInfo')->with('order',$order);

    }

    public function cancel($id)
{

        $purchase = Order::find( $id );
        $ref_ord = $purchase->ref_ord;
        $purchase->delete();
        $carts = Cart::where('ord_ref',$ref_ord)->get();
        foreach ($carts as $cart){
            $cart->delete();
        }
        return redirect()->route('Purchases')
        ->with ('success','Order canceled');

    }
    public function confirm(Request $request , $id)
    {

            $order = Order::find( $id );
            if ($request->input('action') === '1') {
                $order->update([
                    'state' => 1,
                ]);
            } elseif ($request->input('action') === '2') {
                $order->update([
                    'state' => 2,
                ]);
            }
            return redirect()->route('Purchases')
            ->with ('success','Order Status Changed');

        }

    public function details(Request $request , $ord_id)
    {
        $ref_ord = 'Ref#'.$ord_id;
        $products = Cart::where('ord_ref', $ref_ord)->get();
        // dd($products);
        return view('product.orderDetails')->with('products' , $products);

        }

        // public function indexBilling()
        // {
        //     ;
        // }


        public function billing(Request $request , $ord_id)
        {
            $order = Order::find($ord_id);
            $request->validate([
                'name'=>'required',
                'number'=>'required',
                'address'=>'required',

            ]);
            $input = $request->all();
            $order->update([
                'name' => $input['name'],
                'address' => $input['address'],
                'number' => $input['number'],
            ]);

            return redirect()->route('Purchases');
            }



    //  return redirect()->route('Cart');
}




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ManageProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $products = Produit::latest()->paginate(5);
        return view('manageProducts.index',compact('products'))
                ->with('i', (request()->input('page',1) -1) * 5);

    }

    public function create()
    {
        return view('manageProducts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'qntStock'=>'required',
            'category'=>'required',
            'details'=>'required',
            'pic'=>'required',


        ]);
        $input = $request->all();
        if ($request->hasFile('pic')) {
           $destinationPath = 'public/images';
           $image = $request->file('pic');
           $image_name = $image->getClientOriginalName();
           $path = $request->file('pic')-> storeAs($destinationPath ,$image_name );
           $input['pic'] = $image_name;
        }


        Produit::create($input);
        return redirect()->route('manageProducts')
        ->with('success','Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Produit::find($id);
        return view('product.productCard',[ 'product'=>$product ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $product = Produit::find($id);
        return view('manageProducts.edit' ,[ 'product'=>$product ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product = Produit::find($id);
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'qntStock'=>'required',
            'category'=>'required',
            'details'=>'required',
        ]);
        $input = $request->all();
        if ($request->hasFile('pic')) {
            $destinationPath = 'public/images';
            $image = $request->file('pic');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('pic')-> storeAs($destinationPath ,$image_name );
            $input['pic'] = $image_name;
         }
         else{
            unset( $input['pic']);
        }

        $product->update($input);

        return redirect()->route('manageProducts')
        ->with('success','Product have been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Produit::find( $id );
        $product->delete();
        return redirect()->route('manageProducts')
        ->with ('success','Product deleted!');
    }
}

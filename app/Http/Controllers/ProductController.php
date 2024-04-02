<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // all CURD
    // public function __construct(){
    // $this->middleware('auth');
    // $this->middleware('auth')->except(['index','show']);
    // $this->middleware('auth')->only(['create','edit','delelte','store','update']);
    // }

    public function index()
    {
        $products=Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i',(request()->input('page',1) -1)*5);
        //return view('products.index',compact('products'))->with('i', (request()->input('page',1) -1) * 5);

    }


    public function create()
    {
        return view('products.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //  dd($request->all());
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }

        Product::create($input);
        return redirect()->route('products.index')
        ->with('success','Products added successfully');
    }


    public function show(Product $product)
    { 
        return view('products.show',compact('product'));
        
    }

    
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required', 
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }else{
            unset( $input['image']);
        }

        $product->update($input);
      
        return redirect()->route('products.index')
        ->with('success','Products updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success','Products deleted successfully');


    }
}

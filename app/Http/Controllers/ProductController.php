<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(config('app.pagination_size'));
        
        return view('product.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        $categories->prepend('Please select...', '');
        
        return view('product.product_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'amount' => 'integer',
            'price' => 'regex:"^\d+([,.]\d{1,2})?$"',
            'category_id' => 'required',
        ]);
        
        $product = new Product();
        $product->fill($request->all())->save();
        
        Session::flash('flash_message', 'Product successfully created!');
        
        return redirect()->action('ProductController@edit', [$product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.product_show', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        $categories = Category::lists('name', 'id');        
        
        return view('product.product_edit', compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255|unique:products,name,'. $product->id,
            'amount' => 'integer',
            'price' => 'regex:"^\d+([,.]\d{1,2})?$"',
            'category_id' => 'required',
        ]);

        $product->fill($request->all())->save();

        Session::flash('flash_message', 'Product successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        
        Session::flash('flash_message', 'Product successfully deleted!');
        
        return redirect()->back();
    }
}

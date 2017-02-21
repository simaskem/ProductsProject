<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Product;

use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::paginate(config('app.pagination_size'));
        
        return view('category.category_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.category_create');
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
            'name' => 'required|unique:category|max:255'
        ]);
        
        $category = new Category();
        $category->fill($request->all())->save();
        
        Session::flash('flash_message', 'Category successfully created!');
        
        return redirect()->action('CategoryController@edit', [$category]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category.category_show', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.category_edit', ['category' => Category::findOrFail($id)]);
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
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:category,name,'. $category->id .'|max:255'
        ]);

        $category->fill($request->all())->save();

        Session::flash('flash_message', 'Category successfully updated!');

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
        $category = Category::find($id);

        
        if ($category->products->count() > 0) {
            
            Session::flash('flash_message_danger', 'Category cannot be deleted due to related product entries!');
            
        } else {
            
            $category->delete();
        
            Session::flash('flash_message', 'Category successfully deleted!');
            
        }
        
        return redirect()->back();
    }
    
    public function showRelatedProducts(Category $category)
    {        
        $products = Product::where('category_id', $category->id)->paginate();
    
        return view('category.category_related', compact('products'));
//        return view('product.product_list', ['products' => $category->products]);
    }
    
}

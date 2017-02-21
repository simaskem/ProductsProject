<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Product;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function getProductItemInJson($id) {       
             
        try
        {
            $product = Product::findOrFail($id);
            
        
        }
        catch(ModelNotFoundException $e)
        {

            return $e->getMessage();
        }
        
        return response()->json($product)->content();
        
    }
}

<?php

namespace App\Http\Controllers\Home;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Request $request,Category $category){

    $filters=$category->attributes()->where('is_filter',1)->with('values')->get();

    $variation=$category->attributes()->where('is_variation',1)->with('variations')->first();

    $products=$category->products()->filter()->paginate(3);


  // dd( $product->real_price->get()->sortByDesc('price'));
        return view('home.categories.show',compact('category','filters','variation','products'));
    }
}

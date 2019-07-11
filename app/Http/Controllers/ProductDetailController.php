<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        $id = array_pop($url);
        if ($id) {
            $product = Product::where('id', $id)->first();
            return view('product.detail', compact('product'));
        }
        return redirect('/');
    }
}

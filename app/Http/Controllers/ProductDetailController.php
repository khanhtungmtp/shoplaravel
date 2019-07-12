<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
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
            $product = Product::where('active', Product::STATUS_PUBLIC)->find($id);
            $ratings = Rating::with('user:id,name')->where('product_id', $id)->paginate(10);
            return view('product.detail', compact('product', 'ratings'));
        }
        return redirect('/');
    }
}

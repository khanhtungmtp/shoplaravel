<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\AdminProduct;

class ProductDetailController extends Controller
{
    public function index(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        $id = array_pop($url);
        if ($id) {
            $product = AdminProduct::where('id', $id)->first();

            return view('product.detail', compact('product'));
        }
        return redirect('/');
    }
}

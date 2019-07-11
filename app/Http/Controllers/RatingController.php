<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        if ($request->ajax())
        {
            Rating::insert([
                'user_id'    => get_data_user('web'),
                'product_id' => $id,
                'number'     => $request->numberRating,
                'content'    => $request->contentRating,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $product = Product::find($id);
            $product->total_rating +=1;
            $product->total_number_rating = $request->numberRating;
            $product->save();
            return response()->json(['code' => 1]);
        }
    }
}

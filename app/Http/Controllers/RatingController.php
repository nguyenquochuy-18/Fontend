<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function saveRating(Request$request, $id)
    {
        if ($request->ajax())
        {
            $rating = new Rating();
            $rating->ra_product_id = $id;
            $rating->ra_number = $request->number;
            $rating->ra_content = $request->r_content;
            $rating->ra_user_id = get_data_user('web');
            $rating->save();

            $product = Product::find($id);

            $product->pro_total_rating += 1;
            $product->pro_total_number += $request->number;
            $product->save();

            return response()->json(['code' => '1']);
        }
    }
}

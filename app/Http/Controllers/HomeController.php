<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //Sản phẩm hot nhất
        $sliders = Slider::where('active',1)->get();

        //Sản phẩm hot nhất
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'Pro_active' => Product::STATUS_PUBLIC
        ])->limit(8)->get();
        //Sản phẩm mới nhất
        $productNews = Product::where('Pro_active', Product::STATUS_PUBLIC)->limit(8)->orderByDesc('id')->paginate(24);
        //tin tức mới nhất
        $articleNews = Article::orderByDesc('id')->limit(3)->get();

        //Kiểm tra người dùng đăng nhập
        $productSuggest =[];
        if (get_data_user('web'))
        {
            $transactions = Transaction::where([
               'tr_user_id' => get_data_user('web'),
                'tr_status' => Transaction::STATUS_PUBLIC
            ])->pluck('id');
            if (!empty($transactions))
            {
                $listId = Order::whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');
                if (!empty($listId))
                {
                    $listIdCategory = Category::wherein('id',$listId)->distinct()->pluck('id');
                    if ($listIdCategory)
                    {
                        $productSuggest = Product::whereIn('pro_category_id', $listIdCategory)->limit(4)->get();
                    }
                }
            }
        }
        $viewData = [
            'sliders' =>$sliders,
            'productHot' => $productHot,
            'productNews'=>$productNews,
            'articleNews'=>$articleNews,
            'productSuggest' =>$productSuggest,
        ];
        return view('home.index',$viewData);
    }
    public function renderProductView(Request $request)
    {
        if ($request->ajax())
        {
            $listID = $request->id;
            $products = Product::whereIn('id', $listID)->limit(4)->get();
            $html = view('components.product_view',compact('products'))->render();
            return response()->json(['data' => $html]);
        }

    }
}

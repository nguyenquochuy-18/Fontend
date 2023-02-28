<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestShoppingCart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar','pro_number')->find($id);
        if (!$product) return redirect('/');

        $price = $product->pro_price;
        if ($product->pro_sale)
        {
            $price = $price * (100 - $product->pro_sale)/100;
        }

        if ($product->pro_number ==0)
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }

        \Cart::add([
           'id' => $id,
            'name' =>$product->pro_name,
            'qty' =>1,
            'price'=> $price,
            'options' =>[
                'avatar' => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price
            ]
        ]);

        return redirect()->back()->with('success','Mua hàng thành công');
    }
    public function deleteProductItem($key)
    {
        \Cart::remove($key);
        return redirect()->back();
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Danh sách giỏ hàng
     */
    public function getListShoppingCart(Request $request)
    {
        if (\Request::get('id') && (\Request::get('increment')) == 1)
        {
            $rows = \Cart::search(function($key, $value) {
                return $key->id == \Request::get('id');
            });
            $item = $rows->first();
            \Cart::update($item->rowId, $item->qty + 1);
        }
        if (\Request::get('id') && (\Request::get('decrease')) == 1)
        {
            $rows = \Cart::search(function($key, $value) {
                return $key->id == \Request::get('id');
            });
            $item = $rows->first();
            \Cart::update($item->rowId, $item->qty - 1);
        }

        $products = \Cart::content();
        return view('shopping.index',compact('products'));
    }

    /**
     * Thanh toán
     */
    public function getFormPay()
    {
        $products = \Cart::content();
        if (\Cart::total()==0)
        {
            return redirect()->back()->with('danger','Giỏ hàng đang trống');
        }
        return view('shopping.pay',compact('products'));
    }
    public function saveInfoShoppingCart(RequestShoppingCart $request)
    {
        $totalMoney = str_replace(',','',\Cart::subtotal(0,3));

        $transaction = Transaction::create([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int) $totalMoney,
            'tr_note'  => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone
            ]);
        $transactionId = $transaction->id;
        if ($transactionId)
        {
            $products = \Cart::content();

            foreach ($products as $product)
            {
                $oder = new Order() ;
                $oder->or_transaction_id = $transactionId;
                $oder->or_product_id    = $product->id;
                $oder->or_qty           = $product->qty;
                $oder->or_price         = $product->options->price_old;
                $oder->or_sale          = $product->options->sale;
                $oder->save();
            }

        }

        \Cart::destroy();
        return redirect('/');
    }

}

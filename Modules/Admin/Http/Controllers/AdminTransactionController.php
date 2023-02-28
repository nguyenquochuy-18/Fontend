<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        return view('admin::transaction.index',compact('transactions'));
    }
    public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::where('or_transaction_id',$id)->get();
            $html= view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::with('product')->where('or_transaction_id', $id)->get();
        if ($orders)
        {
            foreach ($orders as $order)
            {
                $product = Product::find($order->or_product_id);
                // tru so luong sp
                $product->pro_number = $product->pro_number - $order->or_qty;
                // Tang bien pay sp
                $product->pro_pay ++;
                $product->save();
            }
        }
        DB::table('users')->where('id',$transaction->tr_user_id )->increment('total_pay');
        //increment: tự tang lên 1
        $transaction->tr_status = Transaction::STATUS_PUBLIC;
        $transaction->save();
        return redirect()->back()->with('success','Xử lý đơn hàng thành công');
    }

    public function delete($id)
    {
        $transactions = Transaction::find($id);
        $transactions->delete();
        return \redirect()->back()->with('success','Xóa đơn hàng thành công');
    }
}

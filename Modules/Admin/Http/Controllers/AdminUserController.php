<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::whereRaw(1);
        $users = $users->orderBydesc('id')->paginate(10);
        $viewData = [
            'users' => $users
        ];
        return view('admin::user.index',$viewData);
    }
        public function action($action, $id)
    {
        $message = '';
        if ($action)
        {
            $user = User::find($id);
            $transaction = Transaction::where('tr_user_id',$id);
            $rating = Rating::where('ra_user_id',$id);
            switch ($action)
            {
                case 'delete':
                    if ($user->delete())
                    {
                        $transaction->delete();
                        $rating->delete();
                    }
                    $message = 'Xóa dữ liệu thành công';
                    break;
                case 'active':
                    $user->lock = $user->lock ? 0 : 1;
                    $user->save();
                    $message = 'Cập nhật  dữ liệu thành công';
                    break;
            }


        }
        return redirect()->back()->with('success',$message);
    }
}

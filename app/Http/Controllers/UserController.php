<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //show tổng quan user
    public function índex()
    {
        $transactions = Transaction::where('tr_user_id', get_data_user('web'));
        $listTransactions = $transactions;
        $transactions = $transactions->addSelect('id', 'tr_address', 'tr_phone', 'tr_total', 'created_at', 'tr_status')->paginate(10);

        $totalTransaction = $listTransactions
            ->select('id')
            ->count();

        $totalTransactionDone = $listTransactions->where('tr_status', Transaction::STATUS_PUBLIC)
            ->select('id')
            ->count();

        return view('user.index', compact('totalTransaction', 'totalTransactionDone', 'transactions'));
    }
    public function indexInfomation()
    {
        $users = User::where('id',get_data_user('web'))->get();
        $viewData = [
            'users' => $users
        ];
        return view('user.infomation',$viewData);
    }
    public function updateInfo()
    {
        $users = User::find(get_data_user('web'));
        return view('user.update', compact('users'));
    }
    public function saveUpdateInfo(Request $request)
    {
//        User::where('id',get_data_user('web'))->update($request->except('_token'));
//        return redirect()->back()->with('success','Cập nhật thông tin thành công');
        $user = new User();
        $id  = get_data_user('web');
        if ($id) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->about = $request->about;
            if ($request->hasFile('avatar')) {
                $file = upload_image('avatar');
                if (isset($file['name'])) {
                    $user->avatar = $file['name'];
                }
            }
            $user->save();
            return redirect()->back()->with('success','Cập nhật tài khoản thành công');
        }
        return redirect()->back()->with('danger','Cập nhật tài khoản thất bại');
    }
    public function updatePassword()
    {
        return view('user.password');
    }
    public function saveUpdatePassword(RequestPassword $requestPassword)
    {
        if (Hash::check($requestPassword->password_old, get_data_user('web','password')))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->password);
            $user->save();
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
        }
        return redirect()->back()->with('danger', 'Mật khẩu cũ không đúng');
    }
    public function getProductPay()
    {
        $products = Product::where('pro_pay','>',0)->orderByDesc('pro_pay')->limit(10)->get();
        return view('user.product', compact('products'));
    }
    public function getProductCare()
    {
        return view('user.product_care');
    }
}

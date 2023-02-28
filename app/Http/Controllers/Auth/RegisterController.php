<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestLogin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(RequestLogin $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->id)
        {
            $email = $user->email;
            $code = bcrypt(md5(time().$email));

            $url = route('user.verify.account',['id' => $user->id, 'code' =>$code]);

            $user->code_active = $code;
            $user->time_active = Carbon::now();
            $user->save();

            $data = [
                'route' => $url
            ];
            Mail::send('email.verify_account',$data , function($message) use ($email){
                $message->to($email, 'Xác nhận tài khoản')->subject('Xác nhận tài khoản');
            });

            return redirect()-> route('get.login')->with('success', 'Đăng ký tài khoản thành công, vui lòng xác minh địa chỉ email để đăng nhập tài khoản');
        }
        return redirect()->back();
    }
    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $checkUser = User::where([
            'code_active' => $code,
            'id' => $id
        ])->first();
        if (!$checkUser)
        {
            return redirect('/')->with('danger','Đường dẫn xác minh tài khoản không đúng, bạn vui lòng thử lại sau');
        }
        $checkUser->active = 2;
        $checkUser->save();
        return redirect('/')->with('success','Xác minh tài khoản thành công');

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestLogin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{

    use AuthenticatesUsers;

   public function getLogin()
   {
       return view('auth.login');
   }
   public function postLogin(Request $request)
   {
       $request->validate([
           'email'=>'required|email',
           'password' => 'required|min:6|max:20'
       ],
           [
               'email.required' => 'Vui lòng nhập email',
               'email.email' => 'Không đúng định dạng email',
               'password.required' => 'Vui lòng nhập mật khẩu',
               'password.min' => 'Mật khẩu ít nhất 6 ký tự',
               'password.max' => 'Mật khẩu không vượt quá 20 ký tự'
           ]
       );
       $email = User::where('email', $request->email)->first();
       if (empty($email)) {
           return redirect()->back()->with('danger','Email không tồn tại');
       }

       if(Auth::attempt(['email' => $request ->input('email'),
           'password' => $request ->input('password')]))
       {
           if(get_data_user('web','lock') == 0)
           {
               return redirect()->back()->with('danger','Tài khoản của bạn đang tạm khóa. Vui lòng liên hệ admin');
           }
           if(get_data_user('web','active') == 1)
           {
               return redirect()->back()->with('danger','Tài khoản của bạn chưa được kích hoạt. Kiểm tra địa chỉ email để kích hoạt và đăng nhập tài khoản');
           }
           return redirect()->route('home')->with('success','Đăng nhập tài khoản thành công');
       }
//       if (Auth::attempt($credentials)) {
//            if(get_data_user('web','active') == 1)
//            {
//                return redirect()->back()->with('danger','Tài khoản của bạn chưa được kích hoạt. Kiểm tra địa chỉ email để kích hoạt và đăng nhập tài khoản');
//            }
//           return redirect()->route('home')->with('success','Đăng nhập tài khoản thành công');
//       }
       return redirect()->back()->with('danger','Tài khoản hoặc mật khẩu không đúng');
   }
   public function getLogout()
   {
       Auth::logout();
       return redirect()->route('home');
   }
}

<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request)
    {
//        $credentials = $request->only('email','password');
//        if (Auth::guard('admins')->attempt($credentials)) {
//            return redirect()->route('admin.home');
//        }
//        return redirect()->back();

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
        $email = Admin::where('email', $request->email)->first();
        if (empty($email)) {
            return redirect()->back()->with('danger','Email không tồn tại');
        }

        if(Auth::guard('admins')->attempt(['email' => $request ->input('email'),
            'password' => $request ->input('password')]))
        {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('danger','Tài khoản hoặc mật khẩu không đúng');
    }
    public function getLogout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}

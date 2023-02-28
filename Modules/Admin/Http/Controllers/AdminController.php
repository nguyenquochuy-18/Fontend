<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products= Product::count();
        $totalUser = User::count();
        $transactions = Transaction::count();
        $totalRating = Rating::count();

        $ratings = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();
        $contacts = Contact::limit(10)->get();

        //danh thu ngay
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        //danh thu ngay
        $now = Carbon::now('Asia/Ho_Chi_Minh')->addDay(1)->toDateString();

        $week = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();

        $moneyWeek = Transaction::whereBetween('updated_at',[$week,$now])
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        //danh thu thang
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        //danh thu năm
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))
            ->where('tr_status',Transaction::STATUS_PUBLIC)
            ->sum('tr_total');
        // danh sach don hang moi
        $transactionsNew = Transaction::with('user:id,name')->limit(5)->orderByDesc('id')->get();

        return view('admin::index',compact('ratings','contacts','moneyDay','moneyWeek','moneyMonth','moneyYear','transactionsNew','transactions','totalRating','totalUser','products'));
    }
    public function indexAdmin()
    {
        $admins = Admin::whereRaw(1);
        $admins = $admins->orderBydesc('id')->paginate(10);
        $viewData = [
            'admins' => $admins
        ];
        return view('admin::admin.index',$viewData);
    }
    public function edit()
    {
        $admins = Admin::find(get_data_user('admins'));
        return view('admin::admin.update', compact('admins'));
    }
    public function update(Request $request)
    {
        $admin = new Admin();
        $id  = get_data_user('admins');
        if ($id) {
            $admin = Admin::find($id);
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            if ($request->hasFile('avatar')) {
                $file = upload_image('avatar');
                if (isset($file['name'])) {
                    $admin->avatar = $file['name'];
                }
            }
            $admin->save();
            return redirect()->back()->with('success','Cập nhật tài khoản thành công');
        }
        return redirect()->back()->with('danger','Cập nhật tài khoản thất bại');
    }

}

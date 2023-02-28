<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isEmpty;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name,pro_slug')->paginate(10);
        return view('admin::rating.index',compact('ratings'));
    }
    public function delete($id)
    {
        $ratings = Rating::find($id);
        $ratings->delete();
        return redirect()->back()->with('success','Xóa dữ liệu thành công');
    }

}

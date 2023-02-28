<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminWareHouseController extends Controller
{

    public function getWarehouseProduct(Request $request)
    {
        $products = Product::with('category:id,c_name');
        $column = 'id';
        if ($request->type && $request->type == 'pay')
        {
            $column = 'pro_pay';
            $products->where('pro_pay','>',0);
        }
        else
        {
            $column = 'pro_number';
            $products->where('pro_number','>=',10);
        }
        // tìm theo tên
        if ($request->name) $products->where('pro_name','like','%'.$request->name.'%');

        // tìm theo danh mục
        if ($request->cate)
        {
            $product = Product::where('pro_category_id',$request->cate)->get();
            if (count($product) ==0)
                $cateProducts = Category::select('id')->where('c_parent_id',$request->cate)->get();
            else $cateProducts = Category::select('id')->find($request->cate);
            $products->wherein('pro_category_id',$cateProducts);
        }

        $categories = $this->getCategories();
        $products = $products->orderByDesc($column)->paginate(10);
        return view('admin::warehouse.index',compact('products','categories'));
    }
    public function getCategories()
    {
        return Category::all();
    }

}

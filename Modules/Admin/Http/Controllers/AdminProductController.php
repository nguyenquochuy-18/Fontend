<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if ($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        if ($request->cate) $products->where('pro_category_id',$request->cate);
        $categories = $this->getCategories();
        $products = $products->orderByDesc('id')->paginate(10);
        return view('admin::product.index',compact('products','categories'));
    }


    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::product.create',compact('categories'));
    }

    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update',compact('product','categories'));
    }
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->route('admin.get.list.product')->with('success','Cập nhật thành công');
    }
    public function getCategories()
    {
        return Category:: where('c_parent_id','>',0)->get();
    }
    public function insertOrUpdate($requestProduct,$id ='')
    {
        $product = new Product();
        if ($id) $product = Product::find($id);
        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = Str::slug($requestProduct->pro_name) ;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_number = $requestProduct->pro_number;
        $product->pro_category_id = $requestProduct->pro_category_id;
        if ($requestProduct->hot =="on")
        {
            $product->pro_hot = 1;
        }
        if ($requestProduct->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if (isset($file['name']))
            {
                $product->pro_avatar = $file['name'];
            }
        }

        $product->save();
    }
    public function action($action, $id)
    {
        $message = '';
        if ($action)
        {
            $product = Product::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    $message = 'Xóa dữ liệu thành công';
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    $message = 'Cập nhật  dữ liệu thành công';
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $message = 'Cập nhật  dữ liệu thành công';
                    $product->save();
                    break;
            }


        }
        return redirect()->back()->with('success',$message);
    }
}

<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Icon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $viewData=[
          'categories' => $categories
        ];
        return view('admin::category.index',$viewData);
    }
    public function create()
    {
        $categories = Category::where('c_parent_id', 0)->get();
        return view('admin::category.create',compact('categories'));
    }
    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $menus = Category::where('c_parent_id', 0)->get();
        $category = Category::find($id);
        return view('admin::category.update', compact('category','menus'));
    }
    public function update(RequestCategory $requestCategory,$id)
    {
        $this->insertOrUpdate($requestCategory,$id);
        return redirect()->route('admin.get.list.category')->with('success','Cập nhật thành công');
    }
    public function insertOrUpdate($requestCategory,$id='')
    {
        $code = 1;
        try {
            $category = new Category();
            if ($id)
            {
                $category = Category::find($id);
            }
            $category->c_name =  $requestCategory->c_name;
            $category->c_slug = Str::slug($requestCategory->c_name);
            $category->c_icon = $requestCategory->c_icon;
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->c_name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->c_parent_id = $requestCategory->c_parent_id;
            $category->save();

            $categoryId= $category->id;
            $icon = new Icon();
            $icon->name = $requestCategory->c_name;
            $icon->slug = Str::slug($requestCategory->c_name).'-'.$categoryId;
            $icon->parent_id = $requestCategory->c_parent_id;
            $icon->save();
        }
        catch (\Exception $exception)
        {
            $code = 0;
            Log::error("[Error insertOrUpdate Categories]".$exception->getMessage());
        }
        return $code;
    }
    public function action( $id)
    {
        $category = Category::find($id);
        $category->c_active  = $category->c_active  ? 0 : 1;
        $category->save();
        return redirect()->back()->with('success','Cập nhật  dữ liệu thành công');
    }

    public function destroy(Request $request)
    {
        $id = (int)$request->input('id');
        $category = Category::where('id', $id)->first();

        if ($category) {
            Icon::where('name', $category->c_name)->orWhere('parent_id', $id)->delete();
            Category::where('id', $id)->orWhere('c_parent_id', $id)->delete();

            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}

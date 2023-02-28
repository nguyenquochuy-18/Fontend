<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Icon;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        $products = Product::where('pro_active',Product::STATUS_PUBLIC);

        $cateProduct = [];
        $icon=[];

        if ($id = array_pop($url))
        {
            $cateProduct = Category::find($id);
            $product = Product::where('pro_category_id',$id)->get();
            if (count($product) ==0)
            {
                $cateProducts = Category::select('id')->where('c_parent_id',$id);
                $icon = Icon::where([
                    'parent_id' => $id,
                    'active' => 1
                ])->get();
            }
            else
            {
                $cateProducts = Category::select('id')->find($id);

            }
            $products->wherein('pro_category_id',$cateProducts);

        }

        if ($request->k)
        {
            $products->where('pro_name','like','%'.$request->k.'%');
        }

        //sắp xếp theo giá
        if ($request->price)
        {
            $price = $request->price;
            switch ($price)
            {
                case "1":
                    $products->where('pro_price','<',2000000);
                    break;
                case "2":
                    $products->whereBetween('pro_price',[2000000,4000000]);
                    break;
                case "3":
                    $products->whereBetween('pro_price',[4000000,7000000]);
                    break;
                case "4":
                    $products->whereBetween('pro_price',[7000000,13000000]);
                    break;
                case "5":
                    $products->whereBetween('pro_price',[13000000,20000000]);
                    break;
                case "6":
                    $products->where('pro_price','>',20000000);
                    break;
            }
        }

        //sắp xếp theo thứ tự
        if ($request->orderby)
        {
            $orderby = $request->orderby;
            switch ($orderby)
            {
                case "desc":
                    $products->orderBy('id','DESC');
                    break;
                case "asc":
                    $products->orderBy('id','ASC');
                    break;
                case "price-max":
                    $products->orderBy('pro_price','ASC');
                    break;
                case "price-min":
                    $products->orderBy('pro_price','DESC');
                    break;
                default:
                    $products->orderBy('id','DESC');
            }
        }

        $products = $products->paginate(12);
        $viewData = [
            'products' => $products,
            'cateProduct' => $cateProduct,
            'query' => $request->query(),
            'icon' => $icon
        ];
        return view('product.index',$viewData);
    }
}

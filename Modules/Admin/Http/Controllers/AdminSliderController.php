<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Slider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin::slider.index',compact('sliders'));
    }


    public function create()
    {
        return view('admin::slider.create');
    }

    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin::slider.update',compact('sliders'));
    }
    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('admin.get.list.slider')->with('success','Cập nhật thành công');
    }
    public function insertOrUpdate($request,$id ='')
    {
        $slider = new Slider();
        if ($id) $slider = Slider::find($id);
        $slider->name = $request->name;
        $slider->url = $request->url;
        if ($request->hasFile('avatar'))
        {
            $file = upload_image('avatar');
            if (isset($file['name']))
            {
                $slider->avatar = $file['name'];
            }
        }

        $slider->save();
    }
    public function action($action, $id)
    {
        $message = '';
        if ($action)
        {
            $slider = Slider::find($id);
            switch ($action)
            {
                case 'delete':
                    $slider->delete();
                    $message = 'Xóa dữ liệu thành công';
                    break;
                case 'active':
                    $slider->active = $slider->active ? 0 : 1;
                    $slider->save();
                    $message = 'Cập nhật  dữ liệu thành công';
                    break;
            }


        }
        return redirect()->back()->with('success',$message);
    }
}

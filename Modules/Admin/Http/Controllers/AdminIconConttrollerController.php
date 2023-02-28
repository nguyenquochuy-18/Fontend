<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Icon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminIconConttrollerController extends Controller
{
    public function index()
    {
        $icons = Icon::all();
        $viewData=[
            'icons' => $icons
        ];
        return view('admin::icon.index',$viewData);
    }
    public function edit($id)
    {
        $icon = Icon::find($id);
        return view('admin::icon.update', compact('icon'));
    }
    public function update(Request $request,$id)
    {
        $icon = Icon::find($id);
        $icon->name = $request->name;
        $icon->slug = $request->slug;
        $icon->avatar = $request->icon;
        $icon->save();
        return redirect()->route('admin.get.list.icon')->with('success','Cập nhật thành công');
    }
    public function action($action, $id)
    {
        $message = '';
        if ($action)
        {
            $icon = Icon::find($id);
            switch ($action)
            {
                case 'delete':
                    $icon->delete();
                    $message = 'Xóa dữ liệu thành công';
                    break;
                case 'active':
                    $icon->active = $icon->active ? 0 : 1;
                    $icon->save();
                    $message = 'Cập nhật  dữ liệu thành công';
                    break;
            }


        }
        return redirect()->back()->with('success',$message);
    }

}

<?php


namespace App\Helpers;


use Illuminate\Support\Str;

class Helper
{
    public static function menu($categories, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($categories as $key => $categorie)
        {
            if ($categorie->c_parent_id == $parent_id)
            {
                $html .='
                <tr>
                    <td>' . $categorie->id .'</td>
                    <td>' . $char . $categorie->c_name .'</td>
                    <td>' . $categorie->c_icon .'</td>
                    <td> <a href="/admin/category/active/'. $categorie->id .'"</a> ' . self::active($categorie->c_active) .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/category/update/'. $categorie->id .'">
                            <i class="fas fa-pen" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>

                        <a  href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('. $categorie->id .',\'/admin/category/destroy\')">
                            <i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                    </td>

                </tr>
                ';
                unset($categories[$key]);

                $html .= self::menu($categories, $categorie->id, $char .'---');
            }
        }
        return $html;

    }
    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-sx">Khóa</span>'
            : '<span class="btn btn-success btn-xs">Kích hoạt</span>';
    }

    #menu header
    public static function menus($menus, $parent_id = 0) :string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->c_parent_id == $parent_id) {
                $html .= '
                    <li class="expand">
                        <a href="/danh-muc/'  . Str::slug($menu->c_name, '-'). '-'  . $menu->id . '">
                           <i style="margin-right: 5px;" class="'.$menu->c_icon.'"></i>' . $menu->c_name . '
                        </a>';
                # xóa
                unset($menus[$key]);

                # cấp 2
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="restrain sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->c_parent_id == $id) {
                return true;
            }
        }

        return false;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getListArticle()
    {
        $articles = Article::Paginate(5);
        $articleHot = Article::where('c_hot',Article::HOT)->get();
        return view('article.index',compact('articles', 'articleHot'));
    }
    public function getDetailArticle(Request $request)
    {
        //segment(2) mảng 2
        $arrauUrl = preg_split('/(-)/i',$request->segment(2));

        //array_pop : lay mang cuoi cung
        $id = array_pop($arrauUrl);
        if ($id)
        {
            $articleDetail = Article::find($id);
            $articles = Article::orderByDesc('id')->paginate(10);
            $articleHot = Article::where('c_hot',Article::HOT)->get();
            return view('article.detail',compact('articles','articleDetail','articleHot'));
        }
        return redirect('/');
    }
}

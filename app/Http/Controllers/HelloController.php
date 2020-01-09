<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function index(){
        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name', 'categories.id') //if want 'all' from posts and only 'name' from categories
        ->simplePaginate(2);
        return view('pages.index', compact('post'));
    }

    public function contact(){
        return view('pages.contact');
    }
    
    public function about(){
        return view('pages.about');
    }
}

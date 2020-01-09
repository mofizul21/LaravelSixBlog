<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class BoloController extends Controller
{
    public function addCategory(){
        return view('post/add_category');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
            'slug' => 'required|unique:categories|max:25|min:3'
        ]);

        $data = array(
            'name'  =>  $request->name,
            'slug'  =>  $request->slug
        );
        //return response()->json($data);
        $category = DB::table('categories')->insert($data);
        if ($category) {
            $notification = array(
                'message'   =>  'Category Successfully Created!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'   =>  'Something went wrong!',
                'alert-type'=>  'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allCategory(){
        $category = DB::table('categories')->get();
        //return response()->json($category);
        return view('post.all_category', compact('category'));
    }

    public function viewCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('post.categoryview')->with('cat', $category);
    }

    public function deleteCategory($id){
        $delete = DB::table('categories')->where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'message'   =>  'Category Successfully Deleted!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function editCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('post.editcategory', compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $request->validate([
            'name' => 'required|max:25|min:3',
            'slug' => 'required|max:25|min:3'
        ]);

        $data = array(
            'name'  =>  $request->name,
            'slug'  =>  $request->slug
        );
        //return response()->json($data);
        $category = DB::table('categories')->where('id', $id)->update($data);
        if ($category) {
            $notification = array(
                'message'   =>  'Category Successfully Updated!',
                'alert-type'=>  'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message'   =>  'Nothing to update!',
                'alert-type'=>  'error'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }
}

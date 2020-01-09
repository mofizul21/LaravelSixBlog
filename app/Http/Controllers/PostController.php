<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class PostController extends Controller
{
    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost', compact('category'));
    }

    public function storePost(Request $request){
        $request->validate([
            'title'     => 'required|max:200',
            'details'   => 'required|max:1000',
            'image'     => 'mimes:jpg,jpeg,png|max:4000',
        ]);

        $data = array(
            'title'         =>  $request->title,
            'category_id'   =>  $request->category_id,
            'details'       =>  $request->details,
        );

        $image = $request->file('image');
        if ($image) { // if has image
            // $image_name = hexdec(uniqid()); OR
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $upload_path = 'public/frontend/image/';
            $image_full_name = strtolower($image_name.'.'.$ext);
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);

            $notification = array(
                'message'   =>  'Post Successfully Created!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }else{  // if hasn't image
            DB::table('posts')->insert($data);

            $notification = array(
                'message'   =>  'Post Successfully Created!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allPost(){
        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name') //if want 'all' from posts and only 'name' from categories
        ->get();
        return view('post.allpost', compact('post'));
    }

    public function viewPost($id){
        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->where('posts.id', $id)
        ->first();
        return view('post.postview', compact('post'));
    }

    public function deletePost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;
        $delete = DB::table('posts')->where('id', $id)->delete();
        if ($delete) {
            if($image){ 
                unlink($image);
            }
            $notification = array(
                'message'   =>  'Post Successfully Deleted!',
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

    public function editPost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();

        return view('post.editpost', compact('category', 'post'));
    }

    public function updatePost(Request $request, $id){
        $request->validate([
            'title'     => 'required|max:200',
            'details'   => 'required|max:1000',
            'image'     => 'mimes:jpg,jpeg,png|max:4000',
        ]);

        $data = array(
            'title'         =>  $request->title,
            'category_id'   =>  $request->category_id,
            'details'       =>  $request->details,
        );

        $image = $request->file('image');
        if ($image) { // if update image then delete old image
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $upload_path = 'public/frontend/image/';
            $image_full_name = strtolower($image_name.'.'.$ext);
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            if ($request->old_image) { // when you will a post which have no image
                unlink($request->old_image); // delete old image
            }
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message'   =>  'The Post Successfully Updated!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }else{  // if doesn't update image then keep old image
            $data['image'] = $request->old_image; // fetch old image
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message'   =>  'Post Successfully Updated!',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}

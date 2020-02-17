<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create(){
        $category=DB::table('post_category')->get();
        return view('admin.blog.create',compact('category'));
    }

    public function store(Request $request){
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        $post_image=$request->file('post_image');

        if($post_image){
            $posted_image=hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300,300)->save('public/media/blog/'.$posted_image);
            $data['post_image']='public/media/blog/'.$posted_image;

            DB::table('posts')->insert($data);
                $notification=array(
                    'messege' => 'Successfully Post Inserted',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
        }else{
            $data['post_image']='';
            DB::table('posts')->insert($data);
                $notification=array(
                    'messege' => 'Successfully Post Inserted',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
        }
    }

    public function index(){
        $post=DB::table('posts')->join('post_category','posts.category_id','post_category.id')
            ->select('posts.*','post_category.category_name_en')->get();
        return view('admin.blog.index',compact('post'));
    }

    public function DeletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);
        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
            'messege' => 'Successfully Post Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function EditPost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('post'));
    }
    public function update(Request $request,$id){
        $oldimage=$request->old_image;
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        $post_image=$request->file('post_image');

        if($post_image){
            unlink($oldimage);
            $posted_image=hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300,300)->save('public/media/blog/'.$posted_image);
            $data['post_image']='public/media/blog/'.$posted_image;

            DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                    'messege' => 'Successfully Post Update',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.blogpost')->with($notification);
        }else{
            $data['post_image']=$oldimage;
            DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                    'messege' => 'Successfully Post Update',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.blogpost')->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax()){
            $posts = Post::all();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        }

        return view('post.index');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'post_content' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        
        $data = $request->all();

        Post::create($data);
        

        // return redirect()->route('post.index')->with('success','Success created post');
        return response()->json([
            'success' => true,
            'message' => 'Success created post',
        ]);
    }

    public function edit($id)
    {   
        $post = Post::where('id',$id)->first();

        return response()->json([
            'success' => true,
            'post' => $post
        ]);

        // return view('post.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'post_content' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $post = Post::where('id',$id)->first();
        
        $data = $request->all();

        $post->update($data);
        
        return response()->json([
            'success' => true,
            'message' => 'Success Updated post',
        ]);

    }
    public function destroy($id)
    {
        $post = Post::where('id',$id)->first();
        if($post){
            $post->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Success Deleted post',
            ]);
        }
    }
}

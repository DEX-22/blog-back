<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\NewPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(NewPostRequest $request){
        
        $post = Post::create($request->all());

        return response()->json($post,200);
    }
    public function getAll(){
        return response()->json(Post::all(),200);
    }
}

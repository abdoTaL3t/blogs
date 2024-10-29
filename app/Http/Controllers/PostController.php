<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $postsFromDB = post::all();//=> coliction Object
        return view('posts.index',['posts' => $postsFromDB]);
    }
    public function show(Post $post){
        // $singPostFromDB = post::findOrFail($postId);
  
        return view('posts.show' , ['post' => $post]);

    }
    public function create(){

        $users = User::all();

        return view('posts.create',['users' => $users ]);
    }


    public function store(Request $request){

        // the importanrt thing go to fillable and add the name og what you create == models/post.php
//------------------------------------------------------------------------------------------//


        // make variable = make request and -> direction to name in the alimint in view page
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;


        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();
        Post::create([
            // one his name in DB => name of variable
            'title'=> $title,
            'description'=> $description,
            'user_id' => $post_creator,
        ]);

        return to_route(route: 'posts.store');
    }
    public function edit(Post $post){
        $users = User::all();        

        return view('posts.edit',['users'=> $users , 'post'=> $post]);
    }
    public function update($postId){
        $title = request()-> title;
        $description = request()-> description;
        $post_creator = request()-> post_creator;


        $postsFromDB = post::find($postId);//=> coliction Object
        $postsFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);
        // update the users data in data base
        // dd($data ,$title , $description , $post_creator);
        
        
        return to_route('posts.show', $postId);
    }
    public function destroy($postId){
 
        $postsFromDB = post::find($postId);
        $postsFromDB-> delete();
        return to_route('posts.index');
    }

}

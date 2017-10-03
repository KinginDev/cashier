<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class siteController extends Controller
{
	//Show HomePage
    public function showHome() {

    	$posts = Post::all();
    	return view('pages.home')->withPosts($posts);


    }

    //Show Single Post
     public function showPost($slug) {
     	$post = Post::where('slug',$slug)->first();

     	return view('pages.pages')->withPost($post);
    	
    }


}

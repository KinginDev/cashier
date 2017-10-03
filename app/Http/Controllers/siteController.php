<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class siteController extends Controller
{
	//Show HomePage
    public function showHome() {

        $user = Auth::check() ? Auth::user() : null;
    	$posts = Post::all();
    	return view('pages.home')->withPosts($posts)->withUser($user);


    }

    //Show Single Post
     public function showPost($slug) {
     	$post = Post::where('slug',$slug)->first();

     	return view('pages.pages')->withPost($post);
    	
    }


}

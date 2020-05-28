<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::paginate(3);
        $posts = Post::orderBy('id','DESC')->paginate(3);
        return view('index',compact('posts'));
    }

    //this is for contact page
    public function contact()
    {
        return view('pages.contact');
    }

    //this is for about page
    public function about()
    {
        return view('pages.about');
    }
     //this is for about page
     public function policies()
     {
         return view('pages.policies');
     } 
     
//this is for about page
public function employment()
{
    return view('pages.employment');
} 
}

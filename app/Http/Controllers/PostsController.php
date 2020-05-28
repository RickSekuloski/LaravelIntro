<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('auth',['except'=>'show']);
     }
    public function index()
    {
        //
        // $posts = Post::all();
        $user = Auth::user();
        $posts = Post::where('user_id',$user->id)->get();
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //if you want to specify the rules inside array
        // $request->validate([
        //     'title'=>['required','max:255'],
        // ]);
      
        $title = $request->input('title');
        $body = strip_tags($request->input('body'));
        $input = $request->all();
        $user = Auth::user();
        $post = new Post();
        $post->title = $title;
        $post->body = $body;
        $post->user_id =  $user->id;

        if($request->has('image')){
            $image = $request->file('image');
            $name = time().'_'.$image->getClientOriginalName();
            $folder = 'public/uploads/';
            $imageNameToStore = $name;
            $file = $image->storeAs($folder,$imageNameToStore);
            $post->image =$imageNameToStore;
            
        }else{
            $post->image ='default.jpg';
        }
        $post->save();

        //Second way of storing data into the db
        // $user = Auth::user();
        // $input = $request->all();
     
        //$body = strip_tags($request->body);
        //$body = strip_tags($request->input('body'));
       //$user->posts()->create($input); 
        // return redirect()->back();
       return redirect()->route('post.index')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //  
    $post = Post::findOrFail($id);
    return view('posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required',
        ]);
        $post = Post::findOrFail($id);

         $title = $request->input('title');
        //  $body = $request->input('body');
        $body = strip_tags($request->input('body'));
         $post->title = $title;
         $post->body = $body;
         $post->save();
        return redirect()->route('post.index')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $image ='/storage/uploads/'.$post->image;
        $path = str_replace('\\','/',public_path());
      
        if(file_exists($path.$image)){
           // return 'File Found';
            unlink($path.$image);
            $post->delete();
            return redirect()->route('post.index')->with('success','Post Deleted');
        }
        else{
           // return 'File Not Found';
           $post->delete();
           return redirect()->route('post.index')->with('success','Post Deleted');
        }
       
    }
}

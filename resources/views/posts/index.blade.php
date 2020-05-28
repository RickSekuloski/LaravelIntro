@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Here are the list of all of the available posts</h1>
            

            <table class="table table-dark table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Edit</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($posts)>0)
                        @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                        <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">Edit Post</a></td>
                        <td> <a href="{{route('post.show',$post->id)}}" class="btn btn-success">View</a></td>  
                        <td>

        {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method'=>'POST']) !!}
        @csrf
        {!! Form::hidden('_method','DELETE') !!}
        
        {!! Form::submit('Delete Post',['class'=>'btn btn-danger ']) !!}       
    {!! Form::close() !!}   
                        </td>
                         </tr>
                        @endforeach
                    @else 
                    <h1>There are no posts at the moment</h1>
                    @endif

                  
                </tbody>
              </table>

        </div>
    </div>
@endsection
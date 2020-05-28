@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">

        @foreach ($posts as $post)

        <div class="col-md-4 ">
            <div class="card m-4" style="width: 18rem;">
            <img class="card-img-top" src="/storage/uploads/{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->body}}</p>
                <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">View</a>
                </div>
              </div>
        </div>
            
        @endforeach
    </div><!--end of the row -->
<div class="row">
  <div class="col-md-12 m-5 d-flex justify-content-center">
    {{ $posts->links()}}
  </div>
</div>
</div><!-- container ends-->
@endsection
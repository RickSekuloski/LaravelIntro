@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
    <img src="/storage/uploads/{{$post->image}}" alt="Cover Image" style="height: 80vh;width:100%;">
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2 mt-5 text-center">
        <h1>{{$post->title}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2 mt-5">
        <p>{{$post->body}}</p>
    </div>
</div> 
@endsection
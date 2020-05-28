@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
        <h1>Edit Post - {{$post->title}}</h1>
           
            <div class="col-md-8 offset-2 ">
                {!! Form::open(['action' => ['PostsController@update',$post->id], 'method'=>'POST']) !!}
                @csrf
                {!! Form::hidden('_method','PATCH') !!}
                <div class="form-group">
                    {!! Form::label('title','Enter Title',['class'=>'control-label']) !!}
                    {!! Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title...']) !!}
                </div>  
                <div class="form-group">
                    {!! Form::label('body','Body') !!}
                    {!! Form::textarea('body',$post->body,['id'=>'bodyMCE','class'=>'form-control','rows'=>6, 'cols'=>54,'style'=>'resize:none']) !!}
                </div>
                {!! Form::submit('Edit Post',['class'=>'btn btn-primary btn-block p-4']) !!}       
            {!! Form::close() !!}
            </div>
  
        </div>
    </div>
@endsection

@section('scripts')
<script>
    tinymce.init({
      selector: '#bodyMCE'
    });
  </script>
@endsection
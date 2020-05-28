@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Add Post</h1>
           
            <div class="col-md-8 offset-2 ">
                {!! Form::open(['action' => 'PostsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('title','Enter Title',['class'=>'control-label']) !!}
                    {!! Form::text('title','',['class'=>'form-control','placeholder'=>'Title...']) !!}
                </div>  
                <div class="form-group">
                    {!! Form::label('body','Body') !!}
                    {!! Form::textarea('body',null,['id'=>'bodyMCE','class'=>'form-control','rows'=>6, 'cols'=>54,'style'=>'resize:none']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image','Image') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('Submit',['class'=>'btn btn-primary btn-block p-4']) !!}       
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {{$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged as {{$user->name}}
                    <div class="d-flex justify-content-around mt-5">
                    <a href="{{route('post.create')}}" class="btn btn-info">Create Posts</a>
                    <a href="{{route('post.index')}}" class="btn btn-dark">View Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

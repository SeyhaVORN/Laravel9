@extends('layouts.master')
@section('title', 'View posts')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">View Post
                    <a href="{{ route('posts.create') }}" class="btn btn-info btn-sm float-end">Add post</a>
                </h4>
            </div>
            <div class="card-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h3>hello</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

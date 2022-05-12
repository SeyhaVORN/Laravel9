@extends('layouts.master')
@section('title', 'Create posts')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Create Post
                    <a href="{{ route('posts.index') }}" class="btn btn-info btn-sm float-end">View post</a>
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

                        <form action="{{ route('posts.store') }}">

                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Post Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea type="text" name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Youtube Iframe Link</label>
                                <input type="text" name="yt_iframe" class="form-control">
                            </div>

                            <h6>SEO Tag</h6>

                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                    class="form-control" id="metal_title">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control"
                                    id="meta_description">{{ old('meta_description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keyword" rows="3" class="form-control">{{ old('meta_keyword') }}</textarea>
                            </div>

                            <h6>Status Modal</h6>
                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" value="1" name="status">
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-end">Save Category</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

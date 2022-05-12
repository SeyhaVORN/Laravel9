@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category
                    <a href="{{ route('categories.index') }}" class="btn btn-success btn-sm float-end">List category</a>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
                            </div>

                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" id="slug">
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control" id="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                    id="image">
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
                                    <label>Navbar Status</label>
                                    <input type="checkbox" value="1" name="navbar_status">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" value="1" name="status">
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-end">Save Category</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
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
                        <form action="{{ route('categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $category->name) }}" id="name">
                            </div>

                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control"
                                    value="{{ old('slug', $category->slug) }}" id="slug">
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control"
                                    id="description">{{ old('description', $category->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control"
                                    value="{{ old('image', $category->image) }}" id="image">
                            </div>

                            <h6>SEO Tag</h6>

                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title"
                                    value="{{ old('meta_title', $category->meta_title) }}" class="form-control"
                                    id="meta_title">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control"
                                    id="meta_description">{{ old('meta_description', $category->meta_description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"
                                    id="meta_keyword">{{ old('meta_keyword', $category->meta_keyword) }}</textarea>
                            </div>

                            <h6>Status Modal</h6>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="navbar_status">Navbar Status</label>
                                    <input type="checkbox" name="navbar_status"
                                        {{ $category->navbar_status == '1' ? 'checked' : '' }} id="navbar_status">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}
                                        id="status">
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

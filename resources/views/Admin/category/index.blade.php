@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-header">
                <h4>View Category
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-end">Add
                        Category</a>
                </h4>
            </div>
            <div class="card-body">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="d-flex align-items-center">ID</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td class="align-middle">{{ $item->id }}</td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('uploads/category/' . $item->image) }}" class="category-image"
                                        alt="">
                                </td>
                                <td class="align-middle">{{ $item->status == '1' ? 'hidden' : 'Shown' }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('categories.edit', $item->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>

                                    <a href="javascript:void();"
                                        onclick="document.getElementById('formDelete-{{ $item->id }}').submit()"
                                        class="btn btn-danger btn-sm">Delete</a>

                                    <form id="formDelete-{{ $item->id }}"
                                        action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

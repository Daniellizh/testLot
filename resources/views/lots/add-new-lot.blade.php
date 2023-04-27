@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mt-6">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('store-lot') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="mb-6 ">
                    <label class="block">
                        <span class="text-gray-700">Select Category</span>
                        @foreach($categories as $category)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}">
                                <label class="form-check-label" for="{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </label>
                </div>
                <button class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
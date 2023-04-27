@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mt-6">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('update-lot', $lot->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $lot->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" value="{{ $lot->description }}" class="form-control">
                </div>
                <div class="mb-6 ">
                    <label class="block">
                        <span class="text-gray-700">Select Category</span>
                        <select name="category_id" class="block w-full mt-1 rounded-md">
                            @foreach ($categories as $category)
                            <option @selected($category->id == $lot->category_id)
                                value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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
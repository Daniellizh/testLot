@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <a type="button" href="{{ route('add-new-category') }}" class="btn btn-light">Create category</a>

    @foreach ($categories as $category)
        <div class="row g-0 mb-3">
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <a href="{{ route('edit-category', $category->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('show-category', $category->id) }}" class="btn btn-primary">Show</a>
                    <form action="{{ route('delete-category', $category->id)}}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
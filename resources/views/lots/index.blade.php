@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <a type="button" href="{{ route('add-new-lot') }}" class="btn btn-light">Create lot</a>

    @foreach ($lots as $lot)
        <div class="row g-0 mb-3">
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{ $lot->name }}</h5>
                <p class="card-text">{{ $lot->description }}</p>
                <a href="{{ route('edit-lot', $lot->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('delete-lot', $lot->id)}}" method="POST" style="display:inline-block">
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
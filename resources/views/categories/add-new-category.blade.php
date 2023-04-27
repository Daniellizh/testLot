@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-6">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('store-category') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
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
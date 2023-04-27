@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $lot->name }}</div>
                    <div class="card-body">
                        <p>{{ $lot->description }}</p>
                        <p>Categories: {{ implode(', ', $categories->pluck('name')->toArray()) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
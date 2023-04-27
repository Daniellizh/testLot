@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <a type="button" href="{{ route('lots') }}" class="btn btn-outline-info">Lots</a>
    <a type="button" href="{{ route('categories') }}" class="btn btn-outline-info">Category</a>
<br>
<br>
    <form action="{{ route('home') }}" method="get">
        <div class="form-group">
            <label>Filter by categories:</label><br>
            @foreach ($categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->name }}" class="form-check-input" {{ in_array($category->name, request()->input('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br>
        @foreach($lots as $lot)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $lot->name }}</h5>
              <p class="card-text">{{ $lot->description}}</p>
              <p class="card-text">{{ $lot->categories->name}}</p>
            </div>
          </div>
        @endforeach

        {{-- <form action="{{ route('home') }}" method="get">
            <div class="form-group">
                <label for="categories">Filter by categories:</label>
                <select name="categories[]" id="categories" class="form-control" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ in_array($category->name, request()->input('categories', [])) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form> --}}
    </div>
@endsection
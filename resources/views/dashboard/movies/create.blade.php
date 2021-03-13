@extends('layouts.dashboard.app')

@push('styles')

    <style>
        #movie__upload-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25vh;
            flex-direction: column;
            cursor: pointer;
            border: 1px solid black;
        }
    </style>

@endpush

@section('content')

    <h2>Movies</h2>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index') }}">Movie</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <div style="display: {{ $errors->any() ? 'none' : 'block' }}">
                    <div onclick="document.getElementById('movie__file-input').click()" id="movie__upload-wrapper">
                        <i class="fa fa-video-camera fa-2x"></i>
                        <p>Click to upload</p>
                    </div>
                </div>
                <input type="file" name="" data-movie-id="{{ $movie->id}}" data-url="{{ route('dashboard.movies.store') }}" id="movie__file-input" style="display: none">

                <form action="{{ route('dashboard.movies.update', ['movie' => $movie->id, 'type' => 'publish']) }}" method="post" id="movie__properties"
                      enctype="multipart/form-data" style="display: {{ $errors->any() ? 'block' : 'none' }}">
                    @csrf
                    @method('PUT')

                    {{-- Progress bar --}}
                    <div class="form-group" style="display: {{ $errors->any() ? 'none' : 'block' }}">
                        <label id="movie__upload-status">Uploading</label>
                        <div class="progress">
                            <div class="progress-bar" id="movie__upload-progress" role="progressbar"></div>
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name', $movie->name) }}" id="movie__name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $movie->description) }}</textarea>
                        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Poster --}}
                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" name="poster" value="{{ old('poster', $movie->poster) }}" class="form-control @error('poster') is-invalid @enderror">
                        @error('poster') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" value="{{ old('image', $movie->image) }}" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- categories --}}
                    <div class="form-group">
                        <label>Category</label>
                        <select name="categories[]" class="form-control select2 @error('categories') is-invalid @enderror" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('categories') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Year --}}
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" value="{{ old('year', $movie->year) }}" class="form-control @error('year') is-invalid @enderror">
                        @error('year') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Rating --}}
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" name="rating" value="{{ old('rating', $movie->rating) }}" min="1" class="form-control @error('rating') is-invalid @enderror">
                        @error('rating') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" id="movie__submit-btn" style="display: {{ $errors->any() ? 'block' : 'none' }}" class="btn btn-primary"><i class="fa fa-plus"></i> Publish</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop

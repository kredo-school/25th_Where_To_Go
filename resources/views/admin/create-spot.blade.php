<link rel="stylesheet" href="{{asset('css/admin/spot.css')}}">
@extends('layouts.app')

@section('content')

 
        <h1 class="text-center">Create New Spot</h1>

        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <!-- Spot Name -->
            <div class="form-group mb-3">
                <label for="spot_name">Spot Name:</label>
                <input type="text" class="form-control" id="spot_name" name="spot_name" placeholder="Spot Name" value="{{ old('spot_name') }}">
            </div>

            <!-- Address -->
            <div class="form-group mb-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
            </div>

            <!-- Image Upload -->
            <div class="form-group mb-3">
                <label for="image" class="form-label">Image:</label>
                <img src="{{ asset('images/firework.jpeg') }}" class="img-responsive small-image" alt="Firework Image 1">
                <img src="{{ asset('images/firework.jpeg') }}" class="img-responsive small-image" alt="Firework Image 1">
                <img src="{{ asset('images/firework.jpeg') }}" class="img-responsive small-image" alt="Firework Image 1">
                <img src="{{ asset('images/firework.jpeg') }}" class="img-responsive small-image" alt="Firework Image 1">
                
                <input type="file" class="form-control-file d-block my-3 wide-input" id="image" name="image"> 
                <small class="form-text text-muted ">
                    Acceptable formats: jpeg, jpg, png, gif. Max file size: 10MB.
                </small>
            </div>


            <!-- Latitude and Longitude -->
            <div class="form-row mt-5">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="number" class="form-control short-input" id="latitude" name="latitude" placeholder="12.345678" value="{{ old('latitude') }}">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="number" class="form-control short-input" id="longitude" name="longitude" placeholder="123.456789" value="{{ old('longitude') }}">
                </div>
            </div>

            <!-- Hidden or Visible -->
            <div class="form-row">
            <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                        Visibility
                    </button>
                <div class="dropdown-menu">
                    @if (isset($inquiry)) {{-- $post->trashed() --}}
                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-inquiry-"> {{-- data-bs-target: #unhide-inquiry-{{ $inquiry->id }} --}}
                            <i class="fa-solid fa-eye"></i> Visible {{-- {{ $inquiry->id }} --}}
                        </button>
                    @else
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-inquiry-"> {{-- data-bs-target: #unhide-inquiry-{{ $inquiry->id }} --}}
                            <i class="fa-solid fa-eye-slash"></i> Hidden {{-- {{ $inquiry->id }} --}}
                        </button>
                    @endif
                </div>
            </div>
            <!-- Buttons -->
            <div class="form-group text-center">
                <button type="submit" class="btn-admin">Create</button>
                <a href="#" class="btn-admin">Cancel</a>
            </div>
        </form>
@endsection

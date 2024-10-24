@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/events.css')}}">
@vite(['resources/js/app.js','resources/css/app.css'])

<!-- design starts from here -->
<div class="container background-image">
    <div class="row">
        <div class="col-md-11 event-content mx-auto">
           <!-- images -->
           <div class="images">
                <div class="logo-img text-center mt-4 mb-4">
                     <img src="{{ asset('images/Group 316.png') }}" alt="Where To Go?" class="img-fluid mb-2">
                </div>
               
            
                 <div class="eventbar">
                      <img src="images/eventbar.png" alt="Event Banner" class="banner-img">
                      <div class="banner-text">Event</div>
                 </div>
            </div> 
        </div> 
    </div> 
    
    <!-- start of another row -->
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="spot-banner">
                <a href="#">
                    <img src="images/map.png" class="spot-banner-img mx-auto d-block" alt="map pictures">
                    <div class="spot-banner-text">
                            <h2>Spots near You</h2>
                    </div>
                 </a>
            </div>

            {{-- Search Bar --}}
            <div class="search-container d-flex justify-content-center">
                <form class="d-flex mb-4" role="search">
                    <input class="form-control form-control-lg me-2" type="search" aria-label="Search">
                    <i class="fas fa-search icon_size"></i>
                    <button class="btn fs-3 fw-bold" type="submit">Search</button>
                </form>
            </div>

            <!-- category part -->
            <div class="category">
                @php
                    $categories = ['rainy day','with kid','couple','local','music'];
                @endphp

                @foreach ($categories as $category)
                    <a href="#">{{$category}}</a>
                @endforeach
                <a href="#"><i class="fa-solid fa-ellipsis"></i></a>
            </div>
        </div> 

        <!-- Calendar Section -->
        <div class="col-md-2">
            <div class="calendar-container">
                <div class="calendar-header">
                    <button id="prev-month" class="nav-btn">←</button>
                    <h2 id="month-year"></h2>
                    <button id="next-month" class="nav-btn">→</button>
                </div>
                <table id="calendar">
                    <thead>
                        <tr>
                            <th>SUN</th>
                            <th>MON</th>
                            <th>TUE</th>
                            <th>WED</th>
                            <th>THU</th>
                            <th>FRI</th>
                            <th>SAT</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                        <!-- JavaScriptでここに日付が挿入される -->
                    </tbody>
                </table>
            </div>
        </div> 
    </div> 
    
  {{-- Sort Button --}}
  <form id="sort" class="sort_button">
    <label for="sortOptions" class="fs-4">Sort by</label>
    <select name="price" id="sortOptions" class="fs-4">
        <option value="1">Recommended</option>
        <option value="2">Newest Post</option>
        <option value="3">Popular</option>
        <option value="4">Many Likes</option>
        <option value="5">Many Views</option>
    </select>
    <i class="fa-solid fa-chevron-down icon_size"></i>
  </form>
             

    {{-- Posts Section --}}
    @include('post-spot.event-posts')


@endsection
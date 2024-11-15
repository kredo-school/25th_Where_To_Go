@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')

<link rel="stylesheet" href="{{asset('css/admin/main.css')}}">

<body>
    <!-- Navbar -->


    <!-- Admin Page Title -->
    <div class="container mt-5">
        <div style="text-align: center;">
            <h1 style="display: inline-block; border-bottom: 2px solid #000; padding-bottom: 5px;">Admin Page</h1>
        </div>
        
        <!-- Recommend Setting Button -->
        <div class="text-end mb-3">
            {{-- modal button --}}
            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#category-modal">
                Recommended Posts Setting
            </button>

            @include('admin.modals.recommended_post')
        

            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#create-category">
                Create New Category
            </button>
        </div>
        @include('admin.categories.modals.create_category')

        <!-- User Table -->
        
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
            <tr>
                    <div class="icon-container">
                        <a href="admin-users-index" class="icon-item">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="admin-posts-index" class="icon-item">
                            <i class="fa-solid fa-newspaper"></i>
                        </a>
                        <a href="admin-spots-index" class="icon-item">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                        <a href="admin-categories-index" class="icon-item active">
                            <i class="fa-solid fa-shapes"></i>
                        </a>
                        <a href="{{ route('admin.inquiries.index') }}" class="icon-item">
                            <i class="fa-solid fa-address-card"></i>
                        </a>
                        <a href="{{ route('admin.spot_applications.index') }}" class="icon-item">
                            <i class="fa-solid fa-photo-film"></i>
                        </a>
                    </div>
                </tr>
                <br>
                 <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>Visibility</th>
                    <th></th>
                 </tr>
          </thead>

          <tbody>
         @foreach ($categories as $category)
            <!-- parent category -->
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('Y-m-d H:i:s') }}</td>
                <td>{{ $category->updated_at->format('Y-m-d H:i:s') }}</td>
                <td>
                     {{-- Dropdown for visibility --}}
            <div class="dropdown">
              <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                {{ $category->status === 0 ? 'Hidden' : 'Visible' }}
             </button>

                 <div class="dropdown-menu">
                    @if ($category->status === 0)
                      <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#hide-category-{{ $category->id }}">
                        <i class="fa-solid fa-eye-slash"></i> UnHide
                      </button>
                    @else
                      <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-category-{{ $category->id }}">
                        <i class="fa-solid fa-eye"></i> Hide
                      </button>
                    @endif
                        </div>
                    </div>
                </td>
                <td>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#update-category-{{$category->id}}">
                        <a href="#" class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                    </button>
                </td>
            </tr>

            @include('admin.categories.modals.visibility', ['category' => $category])
            
            @include('admin.categories.modals.update_category', ['category' => $category])

            <!-- child category -->
            @foreach ($category->children as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;└ {{ $child->name }}</td> <!-- インデントを追加して子カテゴリーであることを示す -->
                    <td>{{ $child->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $child->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                {{ $child->status === 0 ? 'Hidden' : 'Visible' }}
                            </button>
                            <div class="dropdown-menu">
                                @if ($child->status === 0)
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#hide-category-{{ $child->id }}">
                                        <i class="fa-solid fa-eye-slash"></i> Hide
                                    </button>
                                @else
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-category-{{ $child->id }}">
                                        <i class="fa-solid fa-eye"></i> Unhide
                                    </button>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#update-child-category-{{ $child->id }}">
                            <a href="#" class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                        </button>
                    </td>
                </tr>
            

            <!-- modal -->
           
            @include('admin.categories.modals.visibility_child_category', ['child' => $child])
            
            @include('admin.categories.modals.update_child_category', ['child' => $child])

            
            
            @endforeach
        @endforeach
    </tbody>
</table>

<!--  Pagination     -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
             @if ($categories->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><</span>
               </li>
             @else
                <li class="page-item">
                    <a class="page-link" href="{{$categories->previousPageUrl()}}" rel="prev"><</a>
                </li>
            @endif

            @for ($page = 1; $page <= $categories->lastPage(); $page++)
              @if ($page == $categories->currentPage())
                <li class="page-item active">
                    <span class="page-link">{{ $page }}</span>
                </li>
              @else
                <li class="page-item">
                    <a class="page-link" href="{{ $categories->url($page) }}">{{ $page }}  
                    </a></li>
                @endif
        @endfor

        {{-- 次のページへのリンク --}}
        @if ($categories->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $categories->nextPageUrl() }}" rel="next">＞</a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">＞</span></li>
        @endif
    </ul>

         </nav>   
        
    
    <!-- Footer -->

</body>
@endsection
 
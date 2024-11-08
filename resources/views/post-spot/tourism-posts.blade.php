<div class="show_posts">
  <h3>Recommend</h3>
  <div class="container">
  <div class="row">
    
    @foreach ($posts as $post)
      <div class="small_post col-md-3">
        <div class="card">
          
          <a href="{{ route('post.show', ['id' => $post->id]) }}">
  <img src="{{ $post->images->isNotEmpty() ? asset('storage/' . $post->images->first()->image_url) : asset('images/default.png') }}" class="card-img-top" alt="Tourism Image">
</a>
          
        
  <div class="card-body">
    <div class="row">
       <div class="col-auto">
           <h5 class="fw-bolder">{{$post->title}}</h5>
              </div>
                  <div class="col-auto">
                     <form action="#">
                        <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-heart"></i></button>
                      </form>
                    </div>
                    <div class="col-auto p-0">
                      <form action="#">
                        <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-star"></i></button>
                      </form>
                    </div>
                  </div>

                  
                    <div class="col-auto mb-1">
                      <span class="badge bg-secondary bg-opacity-50 rounded-pill">Category</span>
                      <span class="badge bg-secondary bg-opacity-50 rounded-pill">Category</span>
                    </div>
                  </div>
                  <div class="post_text">
                    
                    <button class="btn comment-card">Learn More</button>
                   
                  </div>
              
            </div>
         </div>
          
            @endforeach
        </div>
  </div>


  <h3>Tourism posts</h3>
  <div class="row">
    @for ($i = 0; $i < 8; $i++)
        <div class="small_post col-md-3">
            <div class="card">
                <a href="#" >
                  <!-- <img src="{{ asset('images/map_samples/post_pc_sample.png') }}" class="card-img-top" alt="Tourism Image"> -->
                </a>

                <div class="card-body">

                  <div class="row">
                    <div class="col-auto">
                      <h5 class="fw-bolder">Title</h5>
                    </div>
                    <div class="col-auto">
                      <form action="#">
                        <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-heart"></i></button>
                      </form>
                    </div>
                    <div class="col-auto p-0">
                      <form action="#">
                        <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-star"></i></button>
                      </form>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-auto mb-1">
                      <span class="badge bg-secondary bg-opacity-50 rounded-pill">Category</span>
                      <span class="badge bg-secondary bg-opacity-50 rounded-pill">Category</span>
                    </div>
                  </div>
                  <div class="post_text">
                    <p>text text text text text text text text text text text text text text text text text text text text</p>
                    <button class="btn comment-card">Learn More</button>
                   
                  </div>
              
                </div>
            </div>
        </div>
    @endfor
  </div>
</div>
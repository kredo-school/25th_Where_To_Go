<link rel="stylesheet" href="{{asset('css/modal.css')}}">


<div class="modal fade" id="delete-post">
   <div class="modal-dialog w-50">
        <div class="modal-content ">
            <div class="modal-header justify-content-center">
            <h5 class="modal-title mx-auto text-light" id="categoryModalLabel">Delete Posts</h5>
            </div>

            <div class="modal-body text-center">
                <div class="mt-1">
                    <img src="" alt="Post ID " class="image-lg">
                    <p class="mt-1 text-muted"></p>
                </div>
                <div class="mt-1">
                    <i class="fa-solid fa-triangle-exclamation fa-4x"></i>
                    <p class="fw-bold">Are you sure you want to delete this post?</p>
                </div>
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <form action="#" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-modal btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-modal btn-sm">Delete</button>

                </form>
            </div>
        </div>
       
   </div>
</div>



<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="quick-view-modal1">
      
    <form action="{{route('food_order')}}" method="POST">
    @csrf
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Room Assign</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
 
    <input type="checkbox"  name="room_no[]" value="">    
    <label for="vehicle1"></label><br>
 
    </div>
    <div class="modal-footer">
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form


    </div>
  </div>
</div>




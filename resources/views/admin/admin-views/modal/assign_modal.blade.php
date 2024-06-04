    <form action="{{route('admin.roomorders.assign_roomNo')}}" method="POST">
      @csrf
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Room Assign</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" onclick="modalclose()">&times;</span>
      </button>
    </div>
    <div class="modal-body">

    @foreach($room_no as $keys => $value)
    <input type="checkbox"  name="room_no[]" value="{{$value->room_no}}">
    <input type="hidden"  name="room_id" value="{{$room->id}}">
    <input type="hidden"  name="order_id" value="{{$order_id}}">
    <label for="vehicle1">{{$value->room_no}}</label><br>
    @endforeach  
    </div>
    <div class="modal-footer">
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form

   


@extends('admin.index')
@section('content')


<!--main contents start-->
<main class="main-content">
  <div class="page-title"></div>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Update Item
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('manageitem')}}"  class="btn btn-danger text-white btn-sm float-right " style=" border-radius: 0px;">View Item</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" action="{{url('itemupdate/'.$data->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Serial No</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" required="" value="{{ $data->sl}}">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Item Name</label> <label class="text-danger">(Must be English **)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Name" style="border-radius: 0px;" name="item_name" required=""value="{{ $data->item_name}}">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" name="status" required="">
                 <option value="{{ $data->status }}">@if($data->status == 1) Active @else Inactive @endif</option>
                 @if( $data->status == 1 ))
                 <option value="0">Inactive</option>
                 @else
                 <option value="1">Active</option>
                 @endif
                </select>
              </div>

              <div class="form-group">
                <label>Picture</label>
                <input id="imgInp" type="file" class="form-control" style="border-radius: 0px;" name="image">
                @if(isset($data->image))
                <img id="blah" src="{{url($data->image)}}" style="max-height: 70px; border: 1px solid black; margin-top: 5px;">
                @else
                <img id="blah" src="{{url('public/image/itemimage')}}/1.jpg" style="max-height: 70px; border: 1px solid black; margin-top: 5px;">
                @endif
                <input type="hidden" value="{{ $data->image }}" name="old_image">
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                    <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are You sure ?')" style=" border-radius: 0px;">Item Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</main>
<!--main contents end-->



@endsection
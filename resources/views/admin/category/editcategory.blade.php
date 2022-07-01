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
         Category Update
        </div>
       </div>

       <div class="col-lg-4 col-4">
        <a href="{{url('managecategory')}}"  class="btn btn-danger text-white btn-sm float-right " style=" border-radius: 0px;">View Category</a>
       </div>

      </div>

     </div>
     <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="{{url('categoryupdate/'.$data->id)}}">
       @csrf

       <div class="row">
        <div class="col-lg-6">
         <div class="form-group">
          <label for="exampleInputEmail1">Serial No</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" required="" value="{{ $data->sl}}">
         </div>
        </div>

        <div class="col-lg-6">
         <div class="form-group">
          <label for="exampleInputEmail1">Item Name</label>
          <select class="form-control" name="item_id" required="">

           @if(isset($item))
           @foreach($item as $viewdata)

           <option value="{{$viewdata->id}}" <?php if($data->item_id == $viewdata->id){ echo "selected";} ?>>{{ $viewdata->item_name }}</option>

           @endforeach
           @endif
          </select>
         </div>
        </div>
       </div>


       <div class="row">
        <div class="col-lg-6">
         <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label> <label class="text-danger">(Must be English **)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" style="border-radius: 0px;" name="category_name" required="" value="{{ $data->category_name }}">
         </div>
        </div>

        <div class="col-lg-6">
         <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <select class="form-control" name="status" required="">
           <option value="{{ $data->status }}">@if($data->status == 1) Active @else Inactive @endif</option>
           @if($data->status == 1)
           <option value="0">Inactive</option>
           @else
           <option value="1">Active</option>
           @endif
          </select>
         </div>
        </div>
       </div>


       <div class="form-group">
        <label for="exampleInputEmail1">Picture</label>
        <input type="file" class="form-control" style="border-radius: 0px;" id="imgInp" name="image">
        @if(isset($data->image))
        <img src="{{url($data->image)}}" id="blah" style="max-height: 50px;">
        @else
        <img src="{{url('public/image/categoryimage')}}/1.jpg" id="blah" style="max-height: 50px;">
        @endif
        <input type="hidden" name="old_image" value="{{$data->image}}">
       </div>


       <div class="form-group row">
        <div class="col-sm-9 mt-2">
         <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are You sure ?')" style=" border-radius: 0px;">Category Update</button>
         <button type="reset" class="btn btn-warning btn-sm" style=" border-radius: 0px;">Refresh</button>
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
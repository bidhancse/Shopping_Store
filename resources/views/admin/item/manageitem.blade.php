@extends('admin.index')
@section('content')

<!--main contents start-->
<main class="main-content">
 <div class="page-title"></div>

 <div class="container-fluid">

  <!-- state start-->
  <div class="row">
   <div class=" col-sm-12">
    <div class="card card-shadow mb-4">
     <div class="card-header">
      <div class="row">
        <div class="col-lg-8 col-8">
          <div class="card-title mt-2">
            Manage Item
          </div>
        </div>

        <div class="col-lg-4 col-4">
          <a  href="{{url('item')}}"  class="btn btn-primary text-white btn-sm float-right " style=" border-radius: 0px;">Item Add</a>
        </div>

      </div>
    </div>
    <div class="card-body" style="overflow-x:auto;">
      <table id="example" class="table table-bordered table-striped text-center" cellspacing="0">
       <thead>
        <tr>
         <th>Sl.</th>
         <th>Show Sl.</th>
         <th>Item Id</th>
         <th>Item Name</th>
         <th>Status</th>
         <th>Picture</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>

      @php
      $i=1;
      @endphp
      @if(isset($data))
      @foreach($data as $viewdata)
      <tr>
       <td>{{ $i++ }}</td>
       <td>{{ $viewdata->sl }}</td>
       <td>{{ $viewdata->id }}</td>
       <td>{{ $viewdata->item_name }}</td>
       <td>
        @if($viewdata->status == 1)
        <a href="{{ url('inactiveitem/'.$viewdata->id) }}" class="btn btn-success btn-sm">Active</a>
        @else
        <a href="{{ url('activeitem/'.$viewdata->id) }}" class="btn btn-danger btn-sm">Inactive</a>
        @endif
      </td>
      <td>
        @if(isset($viewdata->image))
        <img src="{{url($viewdata->image)}}" style="max-height:50px;" class="zoom">
        @else
        <img src="{{url('public/image/itemimage')}}/1.jpg" class="zoom" style="max-height:50px;">
        @endif
      </td>
      <td>
        <span>
         <a href="{{url('deleteitem/'.$viewdata->id)}}" onclick="return confirm('Are You sure ?')" class="btn btn-danger btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-trash"></i></a>

         <a href="{{url('edititem/'.$viewdata->id)}}" class="btn btn-info btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-pencil-alt
          "></i></a>
        </span>
      </td>
    </tr>


    @endforeach
    @endif


  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</main>

@endsection
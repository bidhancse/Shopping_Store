@extends('admin.index')
@section('content')


<!--main contents start-->
<main class="main-content">
  <div class="page-title">

  </div>


  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Create Subcategory
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('managesubcategory')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Category</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{url('subcategoryupdate/'.$data->id)}}">
              @csrf

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" required="" readonly  value="{{ $data->sl}}">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <select class="form-control" name="item_id" required="" style="border-radius: 0px;">
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
                  <select class="form-control" name="category_id" style="border-radius: 0px;">
                   @if(isset($category))
                   @foreach($category as $viewdata)

                   <option value="{{$viewdata->id}}" <?php if($data->category_id == $viewdata->id ){ echo "selected";} ?>>{{ $viewdata->category_name }}</option>

                   @endforeach
                   @endif
                 </select>
               </div>
             </div>

             <div class="col-lg-6">
               <div class="form-group">
                <label for="exampleInputEmail1">Subcategory Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Subcategory Name" name="subcategory_name" style="border-radius: 0px;" required="" value="{{ $data->subcategory_name}}">
              </div>
            </div>
          </div>

          <div class="row">
           <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Status</label>
              <select class="form-control" name="status" required="">
                <option value="{{$data->status}}">@if($data->status == 1)Active @else Inactive @endif</option>
                @if($data->status == 1)
                <option value="0">Inactive</option>
                @else
                <option value="1">Active</option>
                @endif
              </select>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Picture</label>
              <input type="file" class="form-control" style="border-radius: 0px;" id="imgInp" name="image">
              @if(isset($data->image))
              <img id="blah" src="{{url($data->image)}}" style="max-height: 50px;">
              @else
              <img id="blah" src="{{url('public/subcategoryimage')}}/1.png" style="max-height:50px;">
              @endif
              <input type="hidden" name="old_image" value="{{$data->image}}">
            </div>
          </div>
        </div>


        <div class="form-group row">
          <div class="col-sm-9 mt-2">
            <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create Category</button>
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


<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="item_id"]').on('change', function(){
      var item_id = $(this).val();
      if(item_id) {
        $.ajax({
          url: "{{  url('/categoryget/') }}/"+item_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
            var d =$('select[name="category_id"]').empty();
            $.each(data, function(key, value){
              $('select[name="category_id"]').append('<option value="'+ value.id +'">' + value.category_name + '</option>');

            });

          },

        });
      } else {
        alert('danger');
      }

    });
  });

</script>




@endsection
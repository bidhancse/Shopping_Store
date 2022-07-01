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
                  Create Sub Category
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('managesubcategory')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Sub Category</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{url('subcategoryinsert')}}">
              @csrf

              @php
              $slgen = DB::table('subcategoryinformation')->orderBy('sl','DESC')->first();
              @endphp

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" required="" readonly  value="@if(isset($slgen)) {{$slgen->sl+1}}@else 1 @endif">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <select class="form-control" name="item_id" required="" style="border-radius: 0px;">
                      <option>Select Item</option>
                      @if(isset($item))
                      @foreach($item as $itemview)
                      <option value="{{$itemview->id}}">{{$itemview->item_name}}</option>
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
                      <select class="form-control" name="category_id" style="border-radius: 0px;" >
                    <option value="">Select Category</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subcategory Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Subcategory Name" name="subcategory_name" style="border-radius: 0px;" required="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status" required="" style="border-radius: 0px;" >
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Picture</label>
                    <input id="imgInp" type="file" class="form-control" style="border-radius: 0px;" name="image">
                    <img id="blah" style="max-height: 50px;">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create Sub Category</button>
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
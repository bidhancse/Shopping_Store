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
                  Brand Update
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('managebrand')}}"  class="btn btn-danger text-white btn-sm float-right " style=" border-radius: 0px;">View Brand</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" action="{{url('brandupdate/'.$data->id)}}" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" value="{{$data->sl}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label> <label class="text-danger">(Must be English **)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" style="border-radius: 0px;" name="brand_name" value="{{$data->brand_name}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status">
                      <option value="{{$data->status}}">@if($data->status == 1) Active @else Inactive @endif</option>
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
                    <img id="blah" src="{{url('public/image/brandimage')}}/1.jpg" style="max-height:50px;">
                    @endif

                    <input type="hidden" value="{{ $data->image }}" name="old_image">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are You sure ?')" style=" border-radius: 0px;">Update Brand</button>
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
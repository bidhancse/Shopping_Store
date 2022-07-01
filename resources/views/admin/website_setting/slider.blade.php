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
                  Create Slider
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a  href="{{url('manageslider')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Slider</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{url('sliderinsert')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title" style="border-radius: 0px;">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Url</label> <label class="text-danger">(Must be English **)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Url" style="border-radius: 0px;" name="url">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Picture</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius: 0px;" name="image">
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create slider</button>
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
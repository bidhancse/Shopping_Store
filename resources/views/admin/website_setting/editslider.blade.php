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
                  Slider Update
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a  href="{{url('manageslider')}}"  class="btn btn-danger text-white btn-sm float-right " style=" border-radius: 0px;">Slider View</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{url('sliderupdate/'.$data->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" style="border-radius: 0px;" value="{{ $data->title}}">
              </div>

              <div class="form-group">
                <label>Url</label> <label class="text-danger">(Must be English **)</label>
                <input type="text" class="form-control" placeholder="Enter Url" style="border-radius: 0px;" name="url" value="{{ $data->url}}">
              </div>

              <div class="form-group">
                <label>Picture</label>
                <input type="file" class="form-control" style="border-radius: 0px;" id="imgInp" name="image">
                @if(isset($data->image))
                <img id="blah" src="{{url($data->image)}}" style="max-height: 50px;">
                @else
                <img id="blah" src="{{url('public/image/sliderimage')}}/1.jpg" style="max-height:50px;">
                @endif
                <input type="hidden" value="{{ $data->image }}" name="old_image">
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are You sure ?')" style=" border-radius: 0px;">Update slider</button>
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
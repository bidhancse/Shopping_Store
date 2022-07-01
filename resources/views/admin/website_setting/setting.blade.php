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
                  Update Setting
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a type="submit"  class="btn btn-primary text-white btn-sm float-right " style=" border-radius: 0px;">View Setting</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{url('updatesetting/'.$data->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title" style="border-radius: 0px;" value="{{$data->title}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" style="border-radius: 0px;" value="{{$data->email}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone" name="phone" style="border-radius: 0px;" value="{{$data->phone}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Facebook Url" name="facebook" style="border-radius: 0px;"value="{{$data->facebook}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Instagram Url" name="instagram" style="border-radius: 0px;" value="{{$data->instagram}}">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Twitter Url" name="twitter" style="border-radius: 0px;" value="{{$data->twitter}}">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube Url</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Youtube Url" name="youtube" style="border-radius: 0px;" value="{{$data->youtube}}">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Favicon</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius: 0px;" name="favicon">
                    @if(isset($data->favicon))
                    <img src="{{ url($data->favicon) }}" style="max-height: 50px;">
                    @endif
                    <input type="hidden" value="{{ $data->image }}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Picture</label>
                    <input type="file" class="form-control" style="border-radius: 0px;" name="image">
                    @if(isset($data->image))
                    <img src="{{ url($data->image) }}" style="max-height: 50px;">
                    @endif
                    <input type="hidden" value="{{ $data->image }}">
                  </div>
                </div>
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are You sure ?')" style=" border-radius: 0px;">Update</button>
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
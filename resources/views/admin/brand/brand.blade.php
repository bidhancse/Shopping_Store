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
                  Create Brand
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('managebrand')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Brand</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('brandinsert') }}" enctype="multipart/form-data">
              @csrf

              @php
              $slgen = DB::table('brandinformation')->orderBy('sl','DESC')->first();
              @endphp

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" readonly value="@if(isset($slgen)) {{$slgen->sl+1}}@else 1 @endif">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brand Name</label> <label class="text-danger">(Must be English **)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name" style="border-radius: 0px;" name="brand_name">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Picture</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius: 0px;" name="image">
                  </div>
                </div>
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create Brand</button>
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
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
                  Create Item
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a  href="{{url('manageitem')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View Item</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" action="{{url('iteminsert')}}" enctype="multipart/form-data">
              @csrf

              @php
              $slgen = DB::table('iteminformation')->orderBy('sl','DESC')->first();
              @endphp

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Serial No" name="sl" style="border-radius: 0px;" required="" readonly value="@if(isset($slgen)) {{$slgen->sl+1}}@else 1 @endif">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label> <label class="text-danger">(Must be English **)</label>
                    <input type="text" class="form-control text-uppercase" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Name" style="border-radius: 0px;" name="item_name" required="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" name="status" required="">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>


              <div class="form-group">
                <label>Picture</label>
                <input id="imgInp" type="file" class="form-control" style="border-radius: 0px;" name="image">
                <img id="blah" style="max-height: 50px;">
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create Item</button>
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
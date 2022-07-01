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
                  Create FAQ
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a href="{{url('managefaq')}}"  class="btn btn-success text-white btn-sm float-right " style=" border-radius: 0px;">View FAQ</a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{url('faqinsert')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Question</label> 
                <input type="text" class="form-control" placeholder="Enter Question" style="border-radius: 0px;" name="question">
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Details</label>
                    <textarea id="summernoteabout" class="form-control" name="details"></textarea>
                  </div>
                </div>  
              </div>


              <div class="form-group row">
                <div class="col-sm-9 mt-2">
                  <button type="submit" class="btn btn-info btn-sm" style=" border-radius: 0px;">Create</button>
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
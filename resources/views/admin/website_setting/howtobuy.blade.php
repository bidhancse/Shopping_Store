@extends('admin.index')
@section('content')

<!--main contents start-->
<main class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Create How To Buy
                </div>
              </div>         
            </div>
          </div>

          <div class="card-body">
            <form method="POST" action="{{('howtobuyupdate/'.$data->id)}}">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>How To Buy</label>
                    <textarea id="summernoteabout" class="form-control" name="details">
                      {{ $data->details }}
                    </textarea>
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
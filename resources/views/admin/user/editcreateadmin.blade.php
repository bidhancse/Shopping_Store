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
                  Update Admin
                </div>
              </div>

              <div class="col-lg-4 col-4">
                <a href="{{url('manageadmin')}}"  class="btn btn-danger text-white btn-sm float-right " style=" border-radius: 0px;">View Admin</a>
              </div>

            </div>

          </div>
          <div class="card-body">
            <form method="POST" action="{{url('usercreateupdate/'.$data->id)}}" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" style="border-radius: 0px;" value="{{$data->name}}">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Email</label> <label class="text-danger">(Must be English **)</label>
                    <input type="text" class="form-control" placeholder="Enter email" style="border-radius: 0px;" name="email" value="{{$data->email}}">
                  </div>
                </div>
              </div>
              

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Phone</label> <label class="text-danger">(Must be English **)</label>
                    <input type="text" class="form-control" placeholder="Enter Phone" style="border-radius: 0px;" name="phone" value="{{$data->phone}}">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Enter Address" style="border-radius: 0px;" name="address" value="{{$data->address}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Password</label> <label class="text-danger">(Must be English **)</label> 
                    <input type="password" class="form-control" placeholder="Enter Password" style="border-radius: 0px;" name="password" id="txtPassword" value="">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" style="border-radius: 0px;">
                     <option  value="{{$data->status}}">@if($data->status == 1)Active @else Inactive @endif</option>
                     @if($data->status == 1)
                     <option value="0">Inactive</option>
                     @else
                     <option value="1">Active</option>
                     @endif
                   </select>
                 </div>
               </div>
             </div>


             <div class="form-group">
              <label>Picture</label>
              <input type="file" class="form-control" style="border-radius: 0px;" id="imgInp" name="image">
              @if(isset($data->image))
              <img id="blah" src="{{url($data->image)}}" style="max-height: 50px;">
              @else
              <img id="blah" src="{{url('public/userimage')}}/1.png" style="max-height:50px;">
              @endif

              <input type="hidden" value="{{ $data->image }}" name="old_image">
            </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-9 mt-2">
              <button type="submit" class="btn btn-info btn-sm" id="btnSubmit" style=" border-radius: 0px;" onclick="return Validate()">Admin Update</button>
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
  function Validate() {
    var password = document.getElementById("txtPassword").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    if (password != confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }
</script>

@endsection
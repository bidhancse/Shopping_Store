@extends('admin.index')
@section('content')


<!--main contents start-->
<main class="main-content">
  <div class="page-title"></div>

  <div class="container-fluid">

    <!-- state start-->
    <div class="row">
      <div class=" col-sm-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Manage Admin
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a href="{{url('createadmin')}}"  class="btn btn-primary text-white btn-sm float-right " style=" border-radius: 0px;">Admin Add</a>
              </div>
            </div>
          </div>
          <div class="card-body" style="overflow-x:auto;">
            <table id="example" class="table table-bordered table-striped " cellspacing="0">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Admin name</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Picture</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>



                @php
                $i=1;
                @endphp

                @if(isset($data))
                @foreach($data as $datashow)

                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $datashow->name}}</td>
                  <td>{{ $datashow->email }}</td>
                  <td>{{ $datashow->phone}}</td>
                  <td>{{ Auth()->user()->name}}</td>
                  <td>{{ $datashow->address }}</td>
                  <td>
                    @if($datashow->status == 1)
                    <a href="{{ url('inactiveadmin/'.$datashow->id) }}" class="btn btn-success btn-sm">Active</a>
                    @else
                    <a href="{{ url('activeadmin/'.$datashow->id) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif

                  </td>
                  <td>
                    @if(isset($datashow->image))
                    <img src="{{url($datashow->image)}}" class="zoom" style="max-height: 50px;">
                    @else
                    <img src="{{url('public/image/userimage')}}/1.jpg" class="zoom" style="max-height: 50px;">
                    @endif
                  </td>
                  <td>
                    <span>
                      <a href="{{ url('admindelete/'.$datashow->id) }}" onclick="return confirm('Are You sure ?')" class="btn btn-danger btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-trash"></i></a>

                      <a href="{{ url('adminedit/'.$datashow->id) }}" class="btn btn-info btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-pencil-alt
                        "></i></a>
                      </span>
                    </td>
                  </tr>

                  @endforeach
                  @endif

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <!-- state end-->

    </div>

  </main>
  <!--main contents end-->



  @endsection
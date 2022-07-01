@extends('admin.index')
@section('content')

<!--main contents start-->
<main class="main-content">
  <div class="page-title"></div>
  <div class="container-fluid">
    <div class="row">
      <div class=" col-sm-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Manage FAQ
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a href="{{url('faq')}}"  class="btn btn-primary text-white btn-sm float-right " style=" border-radius: 0px;">Add FAQ</a>
              </div>
            </div>
          </div>
          <div class="card-body" style="overflow-x:auto;">
            <table id="bs4-table" class="table table-bordered table-striped " cellspacing="0">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Question</th>
                  <th>Details</th>
                  <th><center>Action</center></th>
                </tr>
              </thead>
              <tbody>

                @php
                $i = 1;
                @endphp

                @if(isset($data))
                @foreach($data as $viewdata)

                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{ $viewdata->question }}</td>
                  <td>{!! $viewdata->details !!}</td>
                  <td>
                    <center>
                      <span>
                      <a href="{{url('deletefaq/'.$viewdata->id)}}" onclick="return confirm('Are You sure ?')" class="btn btn-danger btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-trash"></i></a>

                      <a href="{{url('editfaq/'.$viewdata->id)}}" class="btn btn-info btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-pencil-alt
                        "></i></a>
                      </span>
                    </center>
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
    </div>

  </main>


  @endsection
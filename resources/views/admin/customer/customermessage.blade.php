@extends('admin.index')
@section('content')

<style>
  .orderstatus {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus1 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus2 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }

  .orderstatus3 {
    color: #f1f1f1;
    padding: 3px 12px;
    border-radius: 30px;
    font-size: 13px;
  }
</style>
<!--main contents start-->
<main class="main-content">
 <div class="page-title">

 </div>


 <div class="container-fluid">

  <!-- state start-->
  <div class="row">
   <div class=" col-sm-12">
    <div class="card card-shadow mb-4">
     <div class="card-header">
      <div class="row">
        <div class="col-lg-8 col-8">
          <div class="card-title mt-2">
            Message View
          </div>
        </div>

        

      </div>
    </div>
    <div class="card-body" style="overflow-x:auto;">
      <table id="example" class="table table-bordered table-striped text-center" cellspacing="0">
       <thead>
        <tr>
         <th>SL.</th>
         <th>Name</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Subject</th>
         <th>Message</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>

     	@php
     	$i = 1;
     	@endphp


      @if(isset($CustomerMessage))
      @foreach($CustomerMessage as $CustomerMessageShow)
      <tr>
        <td>
          {{ $i++ }}
        </td>
        <td>
          {{ $CustomerMessageShow->name}}
        </td>
        <td>
          {{ $CustomerMessageShow->phone}}
        </td>
        <td>
          {{ $CustomerMessageShow->email}}
        </td>
        <td>
          {{ $CustomerMessageShow->subject}}
        </td>
        <td>
          {{ $CustomerMessageShow->message}}
        </td>
        <td>
         <a href="" style="border:0px; color:#FF5500; padding-top:5px;">
              <i class="fa fa-edit"></i>
            </a>
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


@endsection
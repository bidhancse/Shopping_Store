@extends('admin.index')
@section('content')



<!--main contents start-->
<main class="main-content" style="overflow: hidden;">
  <div class="page-title">

  </div>


  <div class="container-fluid" style="overflow-x: scroll;">

    <!-- state start-->
    <div class="row">
      <div class=" col-sm-12">
        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8 col-8">
                <div class="card-title mt-2">
                  Create Product
                </div>
              </div>
              <div class="col-lg-4 col-4">
                <a href="{{url('product')}}"  class="btn btn-primary text-white btn-sm float-right " style=" border-radius: 0px;">Product Add</a>
              </div>
            </div>
          </div>
          </div>
          <div class="card-body bg-white" style="margin-top: -25px;">
            <table id="example" class="display nowrap table table-bordered table-striped" cellspacing="0" style="width: 100%;">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Item Name</th>
                  {{-- <th>Category Name</th>
                  <th>Subcategory Name</th> --}}
                  <th>Brand Name</th>
                  <th>Sale Price</th>
                  <th>Stock Status</th>
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
                @foreach($data as $viewdata)

                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $viewdata->product_code }}</td>
                  <td>{{ $viewdata->product_name }}</td>
                  <td>{{ $viewdata->item_name }}</td>
                  {{-- <td>{{ $viewdata->category_name }}</td>
                  <td>{{ $viewdata->subcategory_name }}</td> --}}
                  <td>{{ $viewdata->brand_name }}</td>
                  <td>{{ $viewdata->sale_price }}</td>

                  <td>
                    @if($viewdata->stock_status == 1)
                    <a href="{{ url('inactivestockstatus/'.$viewdata->id) }}" class="btn btn-outline-success btn-sm" style="border-radius: 0px; padding: 10px;">Stock In</a>
                    @else
                    <a href="{{ url('activestockstatus/'.$viewdata->id) }}" class="btn btn-outline-danger btn-sm" style="border-radius: 0px; padding: 10px;">Stock Out</a>
                    @endif
                  </td>

                  <td>
                    @if($viewdata->status == 1)
                    <a href="{{ url('inactiveproduct/'.$viewdata->id) }}" class="btn btn-outline-primary btn-sm" style="border-radius: 0px; padding: 10px;">Active</a>
                    @else
                    <a href="{{ url('activeproduct/'.$viewdata->id) }}" class="btn btn-outline-danger btn-sm" style="border-radius: 0px; padding: 10px;">Inactive</i></a>
                    @endif
                  </td>
                  
                  <td>
                    @if(isset($viewdata->image))
                    <img src="{{url($viewdata->image)}}" class="zoom" style="max-height: 50px;">
                    @else
                    <img src="{{url('public/image/productimage')}}/1.jpg" class="zoom" style="max-height:50px;">
                    @endif
                  </td>

                  <td>
                    <span>
                      <a href="{{ url('deleteproduct/'.$viewdata->id) }}" onclick="return confirm('Are You sure ?')" class="btn btn-danger btn-sm" style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-trash"></i></a>

                      <a href="{{ url('editproduct/'.$viewdata->id) }}" class="btn btn-info btn-sm"  style="padding-left: 10px; padding-right: 10px; border-radius: 0px;"><i class="ti-pencil-alt
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
    </div>

    <!-- state end-->

  </div>

</main>
<!--main contents end-->



@endsection
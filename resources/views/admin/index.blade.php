@php
$setting = DB::table('settinginformation')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="MHS">
  <!--favicon icon-->
  <link rel="icon" type="image/png" href="{{ url($setting->favicon) }}">
  <title>{{ $setting->title}}</title>
  <!--google font-->
  <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <!--common style-->
  <link href="{{ asset('public/backend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend')}}/assets/vendor/lobicard/css/lobicard.css" rel="stylesheet">
  <link href="{{ asset('public/backend')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('public/backend')}}/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="{{ asset('public/backend')}}/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
  <!--bs4 data table-->
  <link href="{{ asset('public/backend')}}/assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!--summernote-->
  <link href="{{ asset('public/backend')}}/assets/vendor/summernote/summernote-bs4.css" rel="stylesheet">
  <!--select2-->
  <link href="{{ asset('public/backend')}}/assets/vendor/select2/css/select2.css" rel="stylesheet">

  <!--custom css-->
  <link href="{{ asset('public/backend')}}/assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/backend')}}/assets/css/toast.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden" onload="startTime()" onload="startTime()">


  {{-- ...............Scrollbar Start.............. --}}

  <style>
/* width */
::-webkit-scrollbar {
  width: 4px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #ddd; 
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #fd8900; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #fd8900; 
}


/*......data table image hover.....*/

* {
  box-sizing: border-box;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}


</style>

{{-- ...............Scrollbar End.............. --}}



<!--===========header start===========-->
<header class="app-header navbar">

  <!--brand start-->
  <div class="navbar-brand">
    <a class="" href="{{url('/admin')}}">
      <strong style="font-size: 22px;">
        <span style="color: red; font-family: Franklin Gothic Medium;">Admin</span> 
        <span style="color: black; font-family: Franklin Gothic Medium;">Panel</span>
      </strong>
    </a>
  </div>
  <!--brand end-->

  <!--left side nav toggle start-->
  <ul class="nav navbar-nav mr-auto">
    <li class="nav-item d-lg-none">
      <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>
    </li>
    <li class="nav-item d-md-down-none">
      <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
    </li>
  </ul>
  <!--left side nav toggle end-->

  <!--right side nav start-->
  <ul class="nav navbar-nav ml-auto">


    <li class="nav-item dropdown dropdown-slide" style="margin-right: 10px;">
      <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('public/backend')}}/assets/img/user.png" alt="John Doe">
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
        <div class="dropdown-header pb-3">
          <div class="media d-user">
            <img class="align-self-center mr-3" src="{{ asset('public/backend')}}/assets/img/user.png" alt="John Doe">
            <div class="media-body">
              <h5 class="mt-0 mb-0">{{Auth()->user()->name}}</h5>
              <span>{{Auth()->user()->email}}</span>
            </div>
          </div>
        </div>

        <a class="dropdown-item" href="#"><i class=" ti-reload"></i> Activity</a>
        <a class="dropdown-item" href="#"><i class=" ti-email"></i> Message</a>
        <a class="dropdown-item" href="#"><i class=" ti-user"></i> Profile</a>
        <a class="dropdown-item" href="#"><i class=" ti-layers-alt"></i> Projects <span class="badge badge-primary">4</span> </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class=" ti-lock"></i> {{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>

  <!--right side nav end-->
</header>
<!--===========header end===========-->

<!--===========app body start===========-->
<div class="app-body">

  <!--left sidebar start-->
  <div class="left-sidebar">
    <nav class="sidebar-menu">
      <ul id="nav-accordion">
        <li class="nav-title">
          <h5 class="text-uppercase">DEVELOPER</h5>
        </li>
        <li class="sub-menu">
          <a href="javascript:;">
            <i class=" ti-home"></i>
            <span>Developer Tools</span>
          </a>
          <ul class="sub">
            <li><a  href="{{url('mainmenu')}}">Main Menu</a></li>
            <li><a  href="{{url('submenu')}}">Sub Menu</a></li>
          </ul>
        </li>

        <li class="nav-title">
          <h5 class="text-uppercase">Components</h5>
        </li>

        <li class="sub-menu">
          <a href="javascript:;" class="@if(request()->path() === 'createadmin' || request()->path() === 'manageadmin'){{'active'}}@else @endif">
            <i class="fa fa-folder-open"></i>
            <span>Admin Setup</span>
          </a>
          <ul class="sub">
            <li>
              <a href="{{url('createadmin')}}" class="@if(request()->path() === 'createadmin'){{'text-warning'}}@else @endif">Create Admin</a>
            </li>
            <li>
              <a href="{{url('manageadmin')}}" class="@if(request()->path() === 'manageadmin'){{'text-warning'}}@else @endif">Manage Admin</a>
            </li>
          </ul>

          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->path() === 'item' || request()->path() === 'manageitem'){{'active'}}@else @endif">
              <i class="fa fa-folder-open"></i>
              <span>Item Information</span>
            </a>
            <ul class="sub">
              <li>
                <a href="{{url('item')}}" class="@if(request()->path() === 'item'){{'text-warning'}}@else @endif">Item Information</a>
              </li>
              <li>
                <a href="{{url('manageitem')}}" class="@if(request()->path() === 'manageitem'){{'text-warning'}}@else @endif">Manage Item</a>
              </li>

            </li>     
          </ul>

          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->path() === 'category' || request()->path() === 'managecategory' || request()->path() === 'subcategory' || request()->path() === 'managesubcategory'){{'active'}}@else @endif">
              <i class="fa fa-folder-open"></i>
              <span>Category Information</span>
            </a>
            <ul class="sub">
              <li>
                <a href="{{url('category')}}" class="@if(request()->path() === 'category'){{'text-warning'}}@else @endif">Category Add</a>
              </li>
              <li>
                <a href="{{url('managecategory')}}" class="@if(request()->path() === 'managecategory'){{'text-warning'}}@else @endif">Manage Category</a>
              </li>
              <li>
                <a href="{{url('subcategory')}}" class="@if(request()->path() === 'subcategory'){{'text-warning'}}@else @endif">Sub Category</a>
              </li>
              <li>
                <a href="{{url('managesubcategory')}}" class="@if(request()->path() === 'managesubcategory'){{'text-warning'}}@else @endif">Manage Sub Category</a>
              </li>
            </ul>

            <li class="sub-menu">
              <a href="javascript:;" class="@if(request()->path() === 'brand' || request()->path() === 'managebrand'){{'active'}}@else @endif">
                <i class="fa fa-folder-open"></i>
                <span>Brand Information</span>
              </a>
              <ul class="sub">
                <li>
                  <a href="{{url('brand')}}" class="@if(request()->path() === 'brand'){{'text-info'}}@else @endif">Brand Add</a>

                </li>
                <li>
                  <a href="{{url('managebrand')}}" class="@if(request()->path() === 'managebrand'){{'text-info'}}@else @endif">Manage Brand</a>

                </li>
              </ul>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="@if(request()->path() === 'product' || request()->path() === 'manageproduct'){{'active'}}@else @endif">
                <i class="fa fa-folder-open"></i>
                <span>Product Information</span>
              </a>
              <ul class="sub">
                <li>
                  <a href="{{url('product')}}" class="@if(request()->path() === 'product'){{'text-info'}}@else @endif">Product Add</a>
                </li>
                <li>
                  <a href="{{url('manageproduct')}}" class="@if(request()->path() === 'manageproduct'){{'text-info'}}@else @endif">Manage Product</a>
                </li>
                <li>
                  <a href="{{url('viewallproduct')}}" class="@if(request()->path() === 'viewallproduct'){{'text-info'}}@else @endif" target="_blank">View All Product</a>
                </li>
              </ul>
            </li>

            <li class="sub-menu">
              <a  href="javascript:;" class="@if(request()->path() === 'orderinfomation' || request()->path() === 'pendingorder' || request()->path() === 'processingorder' || request()->path() === 'shippingorder' || request()->path() === 'completdorder' || request()->path() === 'monthlyorderreport'){{'active'}}@else @endif">
                <i class="fa fa-folder-open"></i>
                <span>Order Infomation</span>
              </a>
              <ul class="sub">
                <li>
                  <a href="{{url('orderinfomation')}}" class="@if(request()->path() === 'orderinfomation'){{'text-info'}}@else @endif">All Order Infomation</a>
                </li>
                <li>
                  <a href="{{url('pendingorder')}}" class="@if(request()->path() === 'pendingorder'){{'text-info'}}@else @endif">Pending Order</a>
                </li>
                <li>
                  <a href="{{url('processingorder')}}" class="@if(request()->path() === 'processingorder'){{'text-info'}}@else @endif">Processing Order</a>
                </li>
                <li>
                  <a href="{{url('shippingorder')}}" class="@if(request()->path() === 'shippingorder'){{'text-info'}}@else @endif">Shipping Order</a>
                </li>
                <li>
                  <a href="{{url('completdorder')}}" class="@if(request()->path() === 'completdorder'){{'text-info'}}@else @endif">Completd Order</a>
                </li>
                <li>
                  <a href="{{url('monthlyorderreport')}}" class="@if(request()->path() === 'monthlyorderreport'){{'text-info'}}@else @endif">Monthly Order Report</a>
                </li>
              </ul>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="@if(request()->path() === 'slider' || request()->path() === 'manageslider' || request()->path() === 'setting' || request()->path() === 'about' || request()->path() === 'contact' || request()->path() === 'privacy&policy' || request()->path() === 'term&condition' || request()->path() === 'howtobuy' || request()->path() === 'faq' || request()->path() === 'managefaq'){{'active'}}@else @endif">
                <i class="fa fa-folder-open"></i>
                <span>Website Setting</span>
              </a>
              <ul class="sub">
                <li>
                  <a href="{{url('slider')}}" class="@if(request()->path() === 'slider'){{'text-info'}}@else @endif">Slider</a>
                </li>
                <li>
                  <a href="{{url('manageslider')}}" class="@if(request()->path() === 'manageslider'){{'text-info'}}@else @endif">Manage Slider</a>
                </li>
                <li>
                  <a href="{{url('setting')}}" class="@if(request()->path() === 'setting'){{'text-info'}}@else @endif">Setting</a>
                </li>
                <li>
                  <a href="{{url('about')}}" class="@if(request()->path() === 'about'){{'text-info'}}@else @endif">About</a>
                </li>
                <li>
                  <a href="{{url('contact')}}" class="@if(request()->path() === 'contact'){{'text-info'}}@else @endif">Contact</a>
                </li>
                <li>
                  <a href="{{url('privacy&policy')}}" class="@if(request()->path() === 'privacy&policy'){{'text-info'}}@else @endif">Privacy & Policy</a>
                </li>
                <li>
                  <a href="{{url('term&condition')}}" class="@if(request()->path() === 'term&condition'){{'text-info'}}@else @endif">Term & Condition</a>
                </li>
                <li>
                  <a href="{{url('howtobuy')}}" class="@if(request()->path() === 'howtobuy'){{'text-info'}}@else @endif">How To Buy</a>
                </li>
                <li>
                  <a href="{{url('faq')}}" class="@if(request()->path() === 'faq'){{'text-info'}}@else @endif">FAQ</a>
                </li>
                <li>
                  <a href="{{url('managefaq')}}" class="@if(request()->path() === 'managefaq'){{'text-info'}}@else @endif">Manage FAQ</a>
                </li>
              </ul>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="@if(request()->path() === 'customermessage'){{'active'}}@else @endif">
                <i class="fa fa-folder-open"></i>
                <span>Customer Message</span>
              </a>
              <ul class="sub">
                <li>
                  <a href="{{url('customermessage')}}" class="@if(request()->path() === 'customermessage'){{'text-info'}}@else @endif">Customer Message</a>
                </li>
              </ul>
            </li>        

          </li>
        </nav>
      </div>


      @yield('content')


      <!--left sidebar end-->
    </div>
    <!--===========footer start===========-->
    <footer class="app-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 text-right">
           <span id="clock"></span>
           <span id="date"> /  {{ date('l, F j, Y') }}</span>
         </div>

         <div class="col-lg-4 text-right">

         </div>

         <div class="col-lg-4 text-right">

          <span>
           <?php echo date("Y"); ?> © Copyright Develop By <a href="https://www.facebook.com/Bidhan716/">Bidhan Nath</a>
         </span>
       </div>

     </div>
   </div>
 </footer>
 <!--===========footer end===========-->

 <!-- Placed js at the end of the page so the pages load faster -->
 <script src="{{ asset('public/backend')}}/assets/vendor/jquery/jquery.min.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/popper.min.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
 <script class="include" type="text/javascript" src="{{ asset('public/backend')}}/assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/lobicard/js/lobicard.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/jquery.scrollTo.min.js"></script>

 <!--datatables-->
 <script src="{{ asset('public/backend')}}/assets/vendor/data-tables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('public/backend')}}/assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>

 <!--toastr-->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <script>
  $(document).ready(function() {
    $('#bs4-table').DataTable();
  } );
</script>


<script>
  @if (Session::has('messege'))

  var type="{{ Session::get('alert-type', 'info') }}"

  switch(type){

    case 'info':
    toastr.options.positionClass = 'toast-top-right';
    toastr.info("{{ Session::get('messege') }}");

    break;

    case 'success':
    toastr.options.positionClass = 'toast-top-right';
    toastr.success("{{ Session::get('messege') }}");

    break;

    case 'warning':
    toastr.options.positionClass = 'toast-top-right';
    toastr.warning("{{ Session::get('messege') }}");

    break;

    case 'error':
    toastr.options.positionClass = 'toast-top-right';
    toastr.error("{{ Session::get('messege') }}");

    break;

  }

  @endif

</script>

<!--vectormap-->
<script src="{{ asset('public/backend')}}/assets/js/scripts.js"></script>

<!--summernote-->
<script src="{{ asset('public/backend')}}/assets/vendor/summernote/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
                height: 100,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
              });
  });
</script>

<script src="{{ asset('public/backend')}}/assets/vendor/summernote/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernotes').summernote({
                height: 100,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
              });
  });
</script>

<script>
  $(document).ready(function() {
    $('#summernoteabout').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
              });
  });
</script>

<!--select2-->
<script src="{{ asset('public/backend')}}/assets/vendor/select2/js/select2.min.js"></script>
<script src="{{ asset('public/backend')}}/assets/vendor/select2-init.js"></script>

<script>
 /* Navbar ClockDate */
 function startTime() {
  var today = new Date();
  var hr = today.getHours();
  var min = today.getMinutes();
  var sec = today.getSeconds();
  ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
  hr = (hr == 0) ? 12 : hr;
  hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var time = setTimeout(function(){ startTime() }, 500);
  }
  function checkTime(i) {
    if (i < 10) {
     i = "0" + i;
   }
   return i;
 }
</script>

<script>
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  } );
</script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
     responsive: true,
     "order": [[ 0, "desc" ]],
     "lengthMenu": [[10, 5, 15, 25, 50, -1], [10,5,15, 25, 50, "All"]],
     dom: 'Bfrtip',
     buttons: [
     {
      extend: 'copyHtml5',
      exportOptions: {
        columns: [ 0, ':visible' ]
      }
    },
    {
      extend: 'excelHtml5',
      exportOptions: {
        columns: ':visible'
      }
    },
    {
      extend: 'pdf',
      exportOptions: {
        columns: ':visible'
      }
    },
    {
      extend: 'print',
      exportOptions: {
       columns: ':visible'
     }
   },
   'colvis','pageLength'
   ]
 } );
  } );
</script>

</body>

</html>


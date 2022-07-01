@php
$setting = DB::table('settinginformation')->first();
$contact = DB::table('contactinformation')->first();
@endphp

<!DOCTYPE html>
<html lang="zxx">
<head>
   <!-- Meta Tag -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name='copyright' content=''>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Title Tag  -->
   <title>{{ $setting->title}}</title>
   <!-- Favicon -->
   <link rel="icon" type="image/png" href="{{ url($setting->favicon) }}">
   <!-- Web Font -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

   <!-- StyleSheet -->
   <!-- UIkit CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/css/uikit.min.css" />
   <!-- Bootstrap -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/bootstrap.css">
   <!-- Magnific Popup -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/magnific-popup.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/font-awesome.css">
   <!-- Fancybox -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/jquery.fancybox.min.css">
   <!-- Themify Icons -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/themify-icons.css">
   <!-- Animate CSS -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/animate.css">
   <!-- Flex Slider CSS -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/flex-slider.min.css">
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/owl-carousel.css">
   <!-- Slicknav -->
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/slicknav.min.css">

   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/reset.css">
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/style.css">
   <link rel="stylesheet" href="{{asset('public/frontend')}}/css/responsive.css">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="{{asset('public/signin')}}/css/style.css">
   <link rel="stylesheet" href="{{ asset('public/backend')}}/assets/css/toast.css">

</head>
<body class="js" style="background-color: #fff !important;">
 <!-- Header -->
 <header class="header shop">
    <!-- Topbar -->
    <div class="topbar text-center text-md-left">
       <div class="container">
          <div class="row">
             <div class="col-lg-5 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                   <ul class="list-main">
                      <li class="text-md-center">
                        <span><i class="ti-headphone-alt"></i>+880 {{ $setting->phone}}</span>&nbsp;&nbsp;&nbsp;
                        <span><i class="ti-email"></i> {{ $setting->email}}</span>
                      </li>
                   </ul>
                </div>
                <!--/ End Top Left -->
             </div>
             <div class="col-lg-7 col-md-12 col-12 text-center text-md-left">
               <!-- Top Right -->
               <div class="right-content">
                  <ul class="list-main">
                     @if(Auth::check())
                     <li class="text-center"><a href="{{ url('userdashboard')}}" class="single-icon"><i class="fa fa-user" aria-hidden="true" style="font-size: 16px;"></i> My Profile</a></li>
                  </form>

                  @else
                  <li class="text-center">
                     <span><i class="ti-user"></i> <a href="{{ url('usersignup')}}" >Sign Up</a></span>&nbsp;&nbsp;&nbsp;
                     <span><i class="ti-power-off"></i><a href="{{ url('usersignin')}}">Sign In</a></span>
                  </li>
                  @endif

               </ul>
            </div>
            <!-- End Top Right -->
         </div>
      </div>
   </div>
</div>
<!-- End Topbar -->


<div class="middle-inner">
   <div class="container">
      <div class="row">
         <div class="col-lg-2 col-md-2 col-12">
            <!-- Logo -->
            <div class="logo">
               <a href="{{'/shoppingstore'}}"><img src="{{ url($setting->image) }}" alt="logo"></a>
            </div>



            <!--/ End Logo -->
            <!-- Search Form -->
            <div class="search-top">
               <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
               <!-- Search Form -->
               <div class="search-top">
                  <form class="search-form" method="get" action="{{url('searchproduct')}}">
                     @csrf
                     <input type="search" placeholder="Search here..." name="searchdata" style="outline: none;">
                     <button value="search" type="submit"><i class="ti-search"></i></button>
                  </form>
               </div>
               <!--/ End Search Form -->
            </div>
            <!--/ End Search Form -->
            <div class="mobile-nav"></div>
         </div>


         <div class="col-lg-8 col-md-7 col-12">
           <div class="search-bar-top">
              <div class="search-bar">
                 <form method="get" action="{{url('searchproduct')}}" style="width: 100% !important;">
                    @csrf
                    <input type="search" name="searchdata" placeholder="Search Products Here....." required style="width: 100% !important; outline: 0px;">
                    <button class="btnn" type="submit"><i class="ti-search"></i></button>
                 </form>
              </div>
           </div>
        </div>
        <div class="col-lg-2 col-md-3 col-12">
          <div class="right-bar">
             <!-- Cart -->
             <div class="sinlge-bar shopping">
                <a href="#" class="single-icon" uk-toggle="target: #offcanvas-none"><i class="fa fa-shopping-basket"></i> <span class="total-count">{{Cart::count()}}</span></a>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>




<div id="offcanvas-flip" id="offcanvas-slide" uk-offcanvas="flip: false; overlay: true;">
   <div class="uk-offcanvas-bar d-block sidemenu" id="mobilemenuoff" style="transition: 0.9s; border:none;">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <br>
      <br>
      <p style="margin-left: 35px; color: #00c431;">All Categories</p>
      <ul class="uk-nav-parent-icon p-3" uk-nav duration='800'>


         @php
         $item=DB::table('iteminformation')->orderBy('id','ASC')->where('status',1)->get();
         $category=DB::table('categoryinformation')->where('status',1)->get();
         $subcategory=DB::table('subcategoryinformation')->where('status',1)->get();
         @endphp

         @if(isset($item))
         @foreach($item as $itemshow)

         <li class="uk-parent text-dark">
            <a href="{{ url('item/'.$itemshow->id,$itemshow->item_name) }}" style="color: #fff;">
               <span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;{{ $itemshow->item_name }}
            </a>
            <ul class="uk-nav-sub">

               @if(isset($category))
               @foreach($category as $categoryshow)
               @if($itemshow->id == $categoryshow->item_id)

               <li>
                  <a href="{{ url('category/'.$categoryshow->id)}}" style="color: #ffc107">
                     {{ $categoryshow->category_name }}
                  </a>
                  <ul>

                     @if(isset($subcategory))
                     @foreach($subcategory as $subcategoryshow)
                     @if($categoryshow->id == $subcategoryshow->category_id)

                     <li>
                        <a href="{{ url('subcategory/'.$subcategoryshow->id)}}" style="color: #fff">
                           {{ $subcategoryshow->subcategory_name }}
                        </a>
                     </li>

                     @endif
                     @endforeach
                     @endif

                  </ul>
               </li>

               @endif
               @endforeach
               @endif

            </ul>
         </li>

         @endforeach
         @endif

      </ul>
   </div>
</div>
<!----------------End Mobile Menu------------->



<!-- Header Inner -->
<div class="header-inner">
   <div class="container">
      <div class="cat-nav-head">
         <div class="row">
            <div class="col-lg-3">
               <div class="all-category">
                  <h3 class="cat-heading" onmouseover="categoryHideShow()"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>


                  <ul class="main-category opacity">

                     @php
                     $item=DB::table('iteminformation')->orderBy('id','ASC')->where('status',1)->get();
                     $category=DB::table('categoryinformation')->where('status',1)->get();
                     $subcategory=DB::table('subcategoryinformation')->where('status',1)->get();
                     @endphp

                     @if(isset($item))
                     @foreach($item as $itemshow)

                     <li>
                        <a href="{{ url('item/'.$itemshow->id)}}">{{ $itemshow->item_name }} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        <ul class="sub-category">

                           @if(isset($category))
                           @foreach($category as $categoryshow)
                           @if($itemshow->id == $categoryshow->item_id)

                           <li>
                              <a href="{{ url('category/'.$categoryshow->id)}}">{{ $categoryshow->category_name }} <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                              <ul class="multisub-category">

                                 @if(isset($subcategory))
                                 @foreach($subcategory as $subcategoryshow)
                                 @if($categoryshow->id == $subcategoryshow->category_id)

                                 <li><a href="{{ url('subcategory/'.$subcategoryshow->id)}}">{{ $subcategoryshow->subcategory_name }}</a></li>

                                 @endif
                                 @endforeach
                                 @endif

                              </ul>

                           </li>

                           @endif
                           @endforeach
                           @endif

                        </ul>
                     </li>

                     @endforeach
                     @endif

                  </ul>
               </div>
            </div>

            <div class="col-lg-9 col-12">
             <div class="menu-area">
                <!-- Main Menu -->
                <nav class="navbar navbar-expand-lg">
                   <div class="navbar-collapse">   
                      <div class="nav-inner"> 
                         <ul class="nav main-menu menu navbar-nav">
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li><a href="{{ url('allproduct')}}">All Product</a></li>
                            <li><a href="#">Offer Product's</a></li>
                            <li><a href="{{ url('allbrand')}}">Brand</a></li>
                            <li><a href="{{ url('aboutus')}}">About</a></li>
                            <li><a href="{{ url('contactus')}}">Contact Us</a></li>
                         </ul>
                      </div>
                   </div>
                </nav>
                <!--/ End Main Menu --> 
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!--/ End Header Inner -->
</header>
<!--/ End Header -->

@yield('content')

<!-- Start Footer Area -->
<footer class="footer">
 <!-- Footer Top -->
 <div class="footer-top section">
    <div class="container">
       <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
             <!-- Single Widget -->
             <div class="single-footer about">
                <div class="logo">
                   <a href="{{url('/')}}"><img src="{{ url($setting->image) }}" alt="#"></a>
                </div>
                <p class="call">Got Question? Call us 24/7<span><a href="tel:+880 {{ $setting->phone}}">+880 {{ $setting->phone}}</a></span></p>
             </div>
             <!-- End Single Widget -->
          </div>
          <div class="col-lg-3 col-md-6 col-12 float-left">
            <!-- Single Widget -->
            <div class="single-footer links">
               <h4 style="color: #00c431;">Information</h4>
               <ul>
                  <li><a href="{{ url('aboutus')}}">About Us</a></li>
                  <li><a href="{{ url('FAQ')}}">Faq</a></li>
                  <li><a href="{{ url('termcondition')}}">Terms & Conditions</a></li>
               </div>
               <!-- End Single Widget -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer links">
                 <h4 style="color: #00c431;">Customer Service</h4>
                 <ul>
                    <li><a href="#">Payment Methods</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="{{ url('privacypolicy')}}">Privacy Policy</a></li>
                 </ul>
              </div>
              <!-- End Single Widget -->
           </div>
           <div class="col-lg-3 col-md-6 col-12">
             <!-- Single Widget -->
             <div class="single-footer social">
                <h4 style="color: #00c431;">Find Us</h4>
                <p>
                   {!! $contact->details !!}
                </p>
               <!-- End Single Widget -->
               <ul>
                 <li><a href="{{ url($setting->facebook)}}"><i class="ti-facebook"></i></a></li>
                 <li><a href="{{ url($setting->twitter)}}"><i class="ti-twitter"></i></a></li>
                 <li><a href="{{ url($setting->youtube)}}"><i class="ti-youtube"></i></a></li>
                 <li><a href="{{ url($setting->instagram)}}"><i class="ti-instagram"></i></a></li>
              </ul>
           </div>
           <!-- End Single Widget -->
        </div>
     </div>
  </div>
</div>
<!-- End Footer Top -->
<div class="copyright">
  <div class="container">
     <div class="inner">
        <div class="row">
           <div class="col-lg-6 col-12">
              <div class="left">
                 <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>
                 shoppingstore.com.bd All rights reserved</p>
              </div>
           </div>
           <div class="col-lg-6 col-12">
             <div class="right">
                <img src="{{asset('public/frontend')}}/images/payments.png" alt="#">
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
</footer>
<!-- /End Footer Area -->

{{-- Start Mobile Menu --}}

<div class="fixed-bottom bg-white p-2 d-md-none d-block text-center mobilefooter">
  <div class="row">
     <div class="col-md-5 col-5">
        <div class="row">
           <div class="col">
              <li><a href="" uk-toggle="target: #offcanvas-flip"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
              <div class="mt-1 title">Menu</div>
           </div>
           <div class="col">
              <li><a href=""><i class="fa fa-bell"></i></a></li>
              <div class="mt-1 title">Review</div>
           </div>
        </div>
     </div>

     <div class="col-md-2 col-2 home">
       <a href="{{'/shoppingstore'}}"><i class="fa fa-home icons" aria-hidden="true"></i></a>
    </div>


    <div class="col-md-5 col-5">
       <div class="row">
          <div class="col">
             <li><a href="" uk-toggle="target: #offcanvas-none"><i class="fa fa-shopping-basket"></i></a></li>
             <div class="mt-1 title">Cart</div>
          </div>
          <div class="col">

            @if(Auth::check())
            <li><a href="{{ url('userdashboard')}}" ><i class="fa fa-user"></i></a></li>
            <div class="mt-1 title">Profile</div>
            @else
            <li><a href="{{ url('usersignin')}}" ><i class="fa fa-user"></i></a></li>
            <div class="mt-1 title">Login</div>
            @endif

         </div>
      </div>
   </div>
</div>
</div>

{{-- End Mobile Menu --}}

{{-- Start side Cart --}}

<div id="offcanvas-none" uk-offcanvas="mode: slide; overlay:true; flip: true;" style="transition: 5s; z-index: 1100;">
  <div class="uk-offcanvas-bar cartbackground">
     <div class="card-header bg-white" style="border-bottom: 1px solid #ddd;">
        <div class="row">
           <div class="col-md-4 col-4">
              My Cart
           </div>
           <div class="col-md-4 col-4">
              <a href="{{ url('allclear') }}" class="float-right" style="color: red;">Cart Clear</a>
           </div>
           <div class="col-md-4 col-4">
              <span uk-icon="icon:close; ratio:1.2"
              class="uk-offcanvas-close icone float-right"></span>
           </div>
        </div>
     </div>

     <div class="card-body p-0" style="height:450px; overflow: hidden;">
       <div id="cartshow">

        @php
        $Cart =Cart::content();
        @endphp

        @if(isset($Cart))
        @foreach($Cart as $CartDataShow)

        <div class="col-md-12 pt-1 pb-1" style="border-bottom: 1px solid #ddd;">
         <div class="row">
          <div class="col-md-3 col-3">
             <center>
              <img src="{{ url($CartDataShow->options->image)}}" class="img-fluid">
           </center>
        </div>

        <div class="col-md-7 col-7">
          <span style="color: black;">{{$CartDataShow->name}}</span>
          <br>

          @php
          $Price = $CartDataShow->price;
          $Qty = $CartDataShow->qty;
          $Total = $Price * $Qty;
          @endphp

          <span style="color: #00c431">৳ {{$CartDataShow->price}}.00 * {{$CartDataShow->qty}} = {{ $Total }}.00 Tk.</span>
          <br>
       </div>

       <div class="col-md-2 col-2">
          <a href="{{ url('productremove/'.$CartDataShow->rowId) }}">
             <i class="fa fa-trash-o text-dark float-right"></i>
          </a>
       </div>

    </div>
 </div>

 @endforeach
 @endif

</div>
</div>

<!--------------End Body----------------->

<div class="col-sm-12 col-12 p-0" style="bottom: 0; position: absolute;">
 <div class="card-footer mt-3">
    <div class="row mt-2">
       <div class="col-md-6 col-6">
          Grand Total
       </div>

       <div class="col-md-6 col-6 text-right">
          ৳ <span id="cartamount">{{ Cart::subtotal() }}</span>
       </div>
    </div>
    <br>

    @if(Auth::check())
    <a href="{{ url('checkout') }}" class="uk-button uk-button-secondary uk-width-1-1" style="background-color: #00c431; color: #fff;">Checkout</a>
    @else
    <a href="{{ url('usersignin')}}" class="uk-button uk-button-secondary uk-width-1-1" style="background-color: #00c431; color: #fff;">Checkout</a>
    @endif


 </div>
</div>
</div>
</div>

<!-----------End side Cart--------->


<!-- Jquery -->
<script src="{{asset('public/frontend')}}/js/jquery.min.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery-migrate-3.0.0.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="{{asset('public/frontend')}}/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('public/frontend')}}/js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="{{asset('public/frontend')}}/js/colors.js"></script>
<!-- Slicknav JS -->
<script src="{{asset('public/frontend')}}/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('public/frontend')}}/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('public/frontend')}}/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="{{asset('public/frontend')}}/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="{{asset('public/frontend')}}/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
{{-- <script src="{{asset('public/frontend')}}/js/nicesellect.js"></script> --}}
<!-- Flex Slider JS -->
<script src="{{asset('public/frontend')}}/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="{{asset('public/frontend')}}/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="{{asset('public/frontend')}}/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="{{asset('public/frontend')}}/js/easing.js"></script>
<!-- Active JS -->
<script src="{{asset('public/frontend')}}/js/active.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit-icons.min.js"></script>
<!-- Toastr JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

<script>
  function categoryHideShow(){
     var box = document.querySelector(".main-category");
     box.classList.toggle("opacity");

  }
</script>

<script src="{{asset('public/signin')}}/js/jquery.min.js"></script>
<script src="{{asset('public/signin')}}/js/popper.js"></script>
<script src="{{asset('public/signin')}}/js/bootstrap.min.js"></script>
<script src="{{asset('public/signin')}}/js/main.js"></script>
</body>
</html>






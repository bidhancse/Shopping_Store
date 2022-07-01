@php
$setting = DB::table('settinginformation')->first();
$contact = DB::table('contactinformation')->first();
@endphp



<!doctype html>
   <html lang="en">
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Store || Invoice</title>
    <link rel="icon" type="image/x-icon" href="{{url($setting->favicon)}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


 </head>
 <body style="background-image: url();">
    <style>
       body {
          background-color: #f0f0f0;
          font-family: 'Calibri', sans-serif !important
       }

       .mt-100 {
          margin-top: 50px
       }

       .mb-100 {
          margin-bottom: 50px
       }

       .card {
          border-radius: 1px !important
       }

       .card-header {
          background-color: #fff
       }

       .card-header:first-child {
          border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
       }

       .btn-sm,
       .btn-group-sm>.btn {
          padding: .25rem .5rem;
          font-size: .765625rem;
          line-height: 1.5;
          border-radius: .2rem
       }

       @media print {
          input#btnPrint {
             display: none;
          }
       }
    </style>



    <div class="container mt-100 mb-100 ">

       <div id="ui-view">
        <div>
         <div class="card">


            @if(isset($CustomerInfo))
            <div class="card-header"> Invoice : <strong># {{$CustomerInfo->id}}</strong>
             @endif

             <div class="pull-right"> 
               <input type="button" id="btnPrint" class="btn btn-primary btn-sm" onclick="window.print();" value="Print" style="margin-right:-0px; border-radius: 0px; font-size: 16px;" align="right">
            </div>

         </div>
         <div class="card-body">


            <div class="row ">
               <div class="col-sm-12" style="margin-top:-20px;">
                  <img src="{{url($setting->image)}}" class="img-fluid"  style="max-height: 100px; margin-left: -10px;"> 
               </div>
            </div>

            <div class="row mb-4">
            {{-- <center>
               <img src="{{url($setting->image)}}" style="position: absolute; height: 100%;
               width: 100%; opacity: 0.1; background-position: center;
               z-index: 2;" class="img-fluid" > 
            </center> --}}

            <div class="col-sm-4">

             <h6 class="mb-3">From:</h6>
             <div><strong>ADDRESS :</strong> AVENEU-5, ROAD-5, HOUSE-353,
             MIRPUR DOHS, DHAKA.</div>
             <div><strong>E-MAIL :</strong> SUPPORT@ESHOP.COM</div>
             <div><strong>CONTACT :</strong> +880 1851932347</div>



          </div>
          <div class="col-sm-4">
             <h6 class="mb-3">To:</h6>
             @if(isset($CustomerInfo))
             <div><strong>NAME :</strong> {{$CustomerInfo->name}}</div>
             <div><strong>E-MAIL :</strong> {{$CustomerInfo->email}}</div>
             <div><strong>Phone :</strong> {{$CustomerInfo->phone}}</div>
             <div><strong>ADDRESS :</strong> {{$CustomerInfo->address}}</div>

             @endif


          </div>
          <div class="col-sm-4">
             <h6 class="mb-3">Details:</h6>
             @if(isset($CustomerInfo))
             <div><strong>Invoice ID:</strong> # {{$CustomerInfo->id}}</div>
             <div><strong>Order Date :</strong> {{$CustomerInfo->order_date}}</div>
             <div><strong>Payment Method:</strong> {{$CustomerInfo->payment_method}}</div>
             @endif
          </div>
       </div>
       <div class="table-responsive-sm">
         <table class="table table-striped">
          <thead>
           <tr>
            <th class="center"># SL</th>
            <th>Product Name</th>
            <th>Price</th>
            <th class="center">Quantity</th>
            <th class="right">Size</th>
            <th class="right">Color</th>
            <th >Total</th>

         </tr>
      </thead>
      <tbody>

         @php
         $i=1;
         $total=0;
         @endphp

         @if(isset($OrderProductInfo))
         @foreach($OrderProductInfo as $OrderProductInfoShow)

         @php
         $total=$total+$OrderProductInfoShow->total_price;
         @endphp

         <tr>

            <td class="center">{{$i++}}</td>
            <td class="center">{{$OrderProductInfoShow->product_name}}</td>
            <td class="center">{{$OrderProductInfoShow->price}}</td>
            <td class="center">{{$OrderProductInfoShow->qty}}</td>
            <td class="center">{{$OrderProductInfoShow->size}}</td>
            <td class="center">{{$OrderProductInfoShow->color}}</td>
            <td class="center">{{$OrderProductInfoShow->total_price}}</td>

         </tr>

         @endforeach
         @endif

      </tbody>
   </table>
</div>

<div class="row">

   <div class="col-lg-4 col-sm-5 mt-5">

     @php
     $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
     @endphp
     <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($CustomerInfo->id, $generatorPNG::TYPE_CODE_128)) }}">
     <p>Thanks for your Business.</p>

  </div>

  <div class="col-lg-4 col-sm-5 ml-auto">
    <table class="table table-clear">
     <tbody>
      <tr>
       <td class="left"><strong>Subtotal</strong></td>
       <td class="right">TK. {{$total}}.00</td>
    </tr>
    <tr>
       <td class="left"><strong>Delivery Charge</strong></td>
       <td class="right">TK. 60.00</td>
    </tr>
    <tr>
       <td class="left"><strong>VAT </strong></td>
       <td class="right">TK. 00</td>
    </tr>
    <tr>
       <td class="left"><strong>Grand Total</strong></td>
       <td class="right"><strong>TK. {{$total+60}}.00</strong></td>
    </tr>
 </tbody>
</table>





</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
 -->
</body>
</html>






























{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="MHS">
	<title>Invoice Page</title>

	<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
 <style type="text/css">
  @media print {
    input#btnPrint {
      display: none;
   }
}
</style> 

</head>
<body style="background-color:#f2f2f2;">

   <div class="container mt-3" >

      <div class="row">
         <div class=" col-sm-12" style="background-color:#f4f4f4; padding:0px;">
            <div class="card card-shadow" style="padding:0px;">
               <div class="card-body m-0 p-0">

                  <div class="row p-0 m-0">



                     <div class="col-sm-6 mb-2">
                        <span>{{ $setting->phone }} </span> <br/>
                        <span>{{ $setting->email }}</span> <br/>
                     </div>
                     <div class="col-sm-6 text-md-right mb-2">
                        @if(isset($adddata))
                        <span>Invoice # {{$adddata->id}}</span> <br/>
                        <span>Date: {{$adddata->order_date}}</span>
                        @endif
                     </div>

                  </div>

                  <div class="row">

                   <div class="col-sm-6 mb-3 pl-5 ">
                      <h6>TO:</h6>
                      <span><strong>ADDRESS :</strong></span><br> 
                      <span>AVENEU-5, ROAD-5, HOUSE-353,
                      MIRPUR DOHS, DHAKA.</span><br> 
                      <span><strong>E-MAIL :</strong></span> <br>
                      <span>SUPPORT@ESHOP.COM</span> <br>
                      <span><strong>CONTACT :</strong></span> <br>
                      <span>+880 1851932347</span> 
                   </div>

                   <div class="col-sm-6 mb-3 ">
                      <h6>FROM TO:</h6>
                      @if(isset($adddata))
                      <span><strong>Name :</strong></span><br>
                      <span>{{$adddata->name}}</span><br>
                         <span><strong>Phone :</strong></span><br>
                         <span>{{$adddata->phone}}</span><br>
                           <span><strong>Email :</strong></span><br>
                           <span>{{$adddata->email}}</span><br>
                             <span><strong>Shiping Adddress :</strong></span><br>
                             <span>{{$adddata->address}}</span>

                               @endif
                            </div>

                            <div class="col-sm-12 mb-4 " >
                               <center><strong style="text-transform:uppercase; border-bottom:2px solid #F7BD5D; padding-bottom:8px;">Product  Invoice Detalis</strong></center>
                            </div>
                            <div class="col-sm-12 ">
                               <table class="table table-bordered table-striped " style="width:95%;" align="center">
                                  <thead>
                                     <tr>
                                        <th scope="col"># SL</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Total</th>
                                     </tr>
                                  </thead>
                                  <tbody>


                                   @php
                                   $i=1;
                                   $total=0;
                                   @endphp

                                   @if(isset($data))
                                   @foreach($data as $invoicedata)

                                   @php
                                   $total=$total+$invoicedata->total_price;
                                   @endphp


                                   <tr>
                                      <td>{{$i++}}</td>
                                      <td>{{$invoicedata->product_name}}</td>
                                      <td>{{$invoicedata->price}}</td>
                                      <td align="center">{{$invoicedata->qty}}</td>
                                      <td>{{$invoicedata->size}}</td>
                                      <td>{{$invoicedata->color}}</td>
                                      <td>{{$invoicedata->total_price}}</td>
                                   </tr>


                                   @endforeach
                                   @endif



                                </tbody>
                             </table>
                          </div>
                          <div class="col-sm-4 ml-auto">
                           <table class="table table-bordered table-striped" style="width:95%; margin-left:-10px;">
                              <tbody>

                                 <tr>
                                    <td>Subtotal</td>
                                    <td>{{$total}}</td>
                                 </tr>
                                 <tr>
                                    <td>Tax</td>
                                    <td>0.00</td>
                                 </tr>

                                 <tr>
                                    <td>Discount</td>
                                    <td>0.00</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <strong>GRAND TOTAL</strong>
                                    </td>
                                    <td><strong>{{$total}}</strong></td>
                                 </tr>

                              </tbody>
                           </table>
                        </div>

                        <div class="col-sm-12">
                         <div class="border p-4"><Strong>Note:</Strong>
                            <strong class="f12">Thanks for your business</strong>
                            <div align="right">
                             <input type="button" id="btnPrint" class="btn btn-outline-primary btn-sm" onclick="window.print();" value="Print" style="margin-right:-0px;" align="right">
                          </div>
                       </div>
                    </div>

                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>



</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html> --}}
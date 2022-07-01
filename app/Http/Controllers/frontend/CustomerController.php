<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use DB;
use Hash;
use Cart;

class CustomerController extends Controller
{

    /////////////// User Area ///////////////

    public function messagesend(Request $abc) {

        $data = array(
            
            'name'     => $abc->name,
            'subject'  => $abc->subject,
            'email'    => $abc->email,
            'phone'    => $abc->phone,
            'message'  => $abc->message,
        );

        DB::table('customermessage')->insert($data);

        $notification=array(
            'messege'=>'Message Successfully Done !!',
            'alert-type'=>'info'
        );
        return Redirect()->back()->with($notification);
        
    }


    public function usersignin()
    {
        return view('frontend.user.login');
    }


    public function usersignup()
    {
        return view('frontend.user.register');
    }


    public function userdashboard()
    {
        $PendingOrder = DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',0)->get();
        $ProcessingOrder = DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',1)->get();
        $ShippingOrder = DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',2)->get();
        $CompeleteOrder = DB::table('invoice')->where('user_id',Auth()->user()->id)->where('status',3)->get();
        return view('frontend.user.dashboard', compact('PendingOrder','ProcessingOrder','ShippingOrder','CompeleteOrder'));
    }


    public function allorder()
    {
        $OrderData = DB::table('invoice')->where('user_id',Auth()->user()->id)->get();
        return view('frontend.user.allorder', compact('OrderData'));
    }


    public function ordertracking($id)
    {
        $Order=DB::table('invoice')->where('id',$id)->first();
        $OrderData=DB::table('orderdetails')->where('orderdetails.invoice_id',$id)
        ->leftjoin('productinformation','productinformation.id','orderdetails.product_id')
        ->select('orderdetails.*','productinformation.product_name','productinformation.image')
        ->get();
        return view('frontend.user.ordertracking',compact('Order','OrderData'));
    }


    public function updateinformation()
    {
        return view('frontend.user.updateinformation');
    }

    public function userinfoupdate(Request $abc, $id) {

        $data = array(

            'name' => $abc->name,
            'email' => $abc->email,
            'phone' => $abc->phone,
            'address' => $abc->address,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('users')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Information Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


    public function changepassword()
    {
        return view('frontend.user.changepassword');
    }


    public function userregistration(Request $abc) {

        $data = array(
            'name'     => $abc->name,
            'email'    => $abc->email,
            'phone'    => $abc->phone,
            'password' =>Hash::make($abc->password),
            'address'  => $abc->address,
            'role_id' => 2,
        );

        DB::table('users')->insert($data);

        $notification=array(
            'messege'=>'Sign Up Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////////// Shopping Cart ///////////////


    public function addtocart(Request $cart, $id)
    {
        $ProductData = DB::table('productinformation')->where('id',$id)->first();

        $SalePrice       =   $ProductData->sale_price;
        $DiscountPrice   =   $ProductData->discount_price;
        $PresentPrice    =   $SalePrice - $DiscountPrice;

        $data = array();

        $data['id'] = $ProductData->id;
        $data['name'] = $ProductData->product_name;
        $data['qty'] = $cart->quentity;
        $data['weight'] = 0;
        $data['price'] = $PresentPrice;
        $data['options']['sale_price'] = $SalePrice;
        $data['options']['product_size'] = $cart->product_size;
        $data['options']['product_color'] = $cart->product_color;
        $data['options']['image'] = $ProductData->image;

        Cart::add($data);
        $notification=array(
            'messege'=>'Add to Cart Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function checkcart()
    {
        $Cart = Cart::content();
        dd($Cart);
    }


    public function productremove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }


    public function allclear()
    {
        Cart::destroy();
        return redirect()->back();
    }


    public function checkout()
    {
        return view('frontend.user.checkout');
    }


    public function qty_update(Request $cart, $rowId)
    {
        Cart::update($rowId,$cart->qty);
        return redirect()->back();
    }


    public function shippingdetails(Request $cart, $id)
    {
        $Data = array(
            'name'           =>  $cart->name,
            'phone'          =>  $cart->phone, 
            'email'          =>  $cart->email,
            'address'        =>  $cart->address,
            'district'       =>  $cart->district,
            'payment_method' =>  $cart->payment_method,
            'user_id'        =>  $id,
            'status'         =>  0,
            'order_date'     =>  date('Y-m-d'),
        );

        $Shipping = DB::table('invoice')->insertGetId($Data);
        $Content  = Cart::content();

        $CartData = array();
        foreach ($Content as $ProductData)
        {
            $CartData['invoice_id']   =   $Shipping;
            $CartData['product_id']   =   $ProductData->id;
            $CartData['qty']          =   $ProductData->qty;
            $CartData['size']         =   $ProductData->options->product_size;
            $CartData['color']        =   $ProductData->options->product_color;
            $CartData['price']        =   $ProductData->price;
            $CartData['total_price']  =   $ProductData->subtotal;

            DB::table('orderdetails')->insert($CartData);
        }

        Cart::destroy();
        $notification=array(
            'messege'    =>' Order Successfully Done !!',
            'alert-type' =>'success'
        );
        return redirect('/')->with($notification);
    }






}


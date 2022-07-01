<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class OrderInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function orderinfomation()
    {
        $AllOrder=DB::table('invoice')->get();
        return view('admin.orderinformation.orderinformation',compact('AllOrder'));
    }


    public function pendingorder()
    {
        $PendingOrder=DB::table('invoice')->where('status',0)->get();
        return view('admin.orderinformation.pendingorder',compact('PendingOrder'));
    }


    public function processingorder()
    {
        $ProcessingOrder=DB::table('invoice')->where('status',1)->get();
        return view('admin.orderinformation.processingorder',compact('ProcessingOrder'));
    }


    public function shippingorder()
    {
        $ShippingOrder=DB::table('invoice')->where('status',2)->get();
        return view('admin.orderinformation.shippingorder',compact('ShippingOrder'));
    }


    public function completdorder()
    {
        $CompletdOrder=DB::table('invoice')->where('status',3)->get();
        return view('admin.orderinformation.completdorder',compact('CompletdOrder'));
    }


    public function updatestatus(Request $abc, $id)
    {
        DB::table('invoice')->where('id',$id)->update(['status' => $abc->status ]);

        $notification=array(
            'messege'    =>'Order Status Change Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function monthlyorderreport()
    {
        return view('admin.orderinformation.monthlyorderreport');
    }



    public function searchordermonthly(Request $abc){
        $dataForm = $abc->fromdate;
        $dataTo = $abc->todate;
 
        $OrderReportInfo = DB::table('invoice')
           ->where('order_date', '>=', $dataForm)
           ->where('order_date', '<=', $dataTo)
           ->leftjoin('orderdetails','orderdetails.invoice_id','invoice.id')
           ->select('invoice.*','orderdetails.total_price','orderdetails.invoice_id')
           ->get();



       return view('admin.orderinformation.searchordermonthly', compact('OrderReportInfo'));
    }

    public function invoice($id)
    {
        $CustomerInfo = DB::table('invoice')->where('id',$id)->first();
        $OrderProductInfo = DB::table('orderdetails')->where('orderdetails.invoice_id',$id)
        ->leftjoin('productinformation','productinformation.id','orderdetails.product_id')
        ->select('orderdetails.*','productinformation.product_name')
        ->get();

        return view('admin.orderinformation.invoice', compact('CustomerInfo','OrderProductInfo'));
    }


}



            

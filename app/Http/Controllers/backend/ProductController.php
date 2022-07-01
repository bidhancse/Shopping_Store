<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function product(){
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->get();
        $brand = DB::table('brandinformation')->where('status',1)->get();
        return view ('admin.product.product', compact('item','category','brand'));
    }


//////////// Item-> Category Select /////////////


    public function categoryget($item_id) {

        $data = DB::table('categoryinformation')->where('status',1)->where('item_id',$item_id)->get();
        return json_encode($data);
    }


//////////// Category-> SubCategory Select /////////////


    public function subcategoryget($category_id) {

        $data = DB::table('subcategoryinformation')->where('status',1)->where('category_id',$category_id)->get();
        return json_encode($data);
    }


///////////// Insert //////////////


    public function productinsert(Request $abc) {

        $data = array(
            'product_code'       =>   $abc->product_code,
            'product_name'       =>   $abc->product_name,
            'item_id'            =>   $abc->item_id,
            'category_id'        =>   $abc->category_id,
            'subcategory_id'     =>   $abc->subcategory_id,
            'brand_id'           =>   $abc->brand_id,
            'purchase_price'     =>   $abc->purchase_price,
            'sale_price'         =>   $abc->sale_price,
            'discount_price'     =>   $abc->discount_price,
            'quentity'           =>   $abc->quentity,
            'measurement_type'   =>   $abc->measurement_type,
            'short_details'      =>   $abc->short_details,
            'full_details'       =>   $abc->full_details,
            'product_size'       =>   $abc->product_size,
            'product_color'      =>   $abc->product_color,
            'stock_status'       =>   $abc->stock_status,
            'status'             =>   $abc->status,
            'admin_id'           =>   Auth()->user()->id,
        );

        $ProductPicture = $abc->file('image');

        if ($ProductPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$ProductPicture->getClientOriginalExtension();
            Image::make($ProductPicture)->save('public/image/productimage/'.$image_one_name,80);
            $data['image']='public/image/productimage/'.$image_one_name;
            DB::table('productinformation')->insert($data);

        }

        else {
            DB::table('productinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Product Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function manageproduct(){
       $data = DB::table('productinformation')
       ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
       // ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
       // ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
       ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
       ->select('productinformation.*','iteminformation.item_name','brandinformation.brand_name')
       ->get();
       return view('admin.product.manageproduct', compact('data'));
   }


////////// Stock Status Inactive /////////////


    public function inactivestockstatus($id)
    {
        DB::table('productinformation')->where('id',$id)->update(['stock_status' => 0]);

        $notification=array(
            'messege'=>'Stock Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Stock Status Active /////////////


    public function activestockstatus($id)
    {
        DB::table('productinformation')->where('id',$id)->update(['stock_status' => 1]);

        $notification=array(
            'messege'=>'Stock Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



////////// Product Status Inactive /////////////


    public function inactiveproduct($id)
    {
        DB::table('productinformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Product Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Product Status Active /////////////


    public function activeproduct($id)
    {
        DB::table('productinformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Product Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////


    public function deleteproduct($id)
    {
        $check = DB::table('productinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('productinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('productinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Product Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////


    public function editproduct($id)
    {
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->get();
        $subcategory = DB::table('subcategoryinformation')->where('status',1)->get();
        $brand = DB::table('brandinformation')->where('status',1)->get();

        $data = DB::table('productinformation')->where('productinformation.id',$id)
       ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
       ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
       ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
       ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
       ->select('productinformation.*','iteminformation.item_name','categoryinformation.category_name','subcategoryinformation.subcategory_name','brandinformation.brand_name')
       ->first();
        return view ('admin.product.editproduct',compact('item','category','subcategory','brand','data'));
    }


public function productupdate(Request $abc, $id) {

        $data = array(
            'product_code'       =>   $abc->product_code,
            'product_name'       =>   $abc->product_name,
            'item_id'            =>   $abc->item_id,
            'category_id'        =>   $abc->category_id,
            'subcategory_id'     =>   $abc->subcategory_id,
            'brand_id'           =>   $abc->brand_id,
            'purchase_price'     =>   $abc->purchase_price,
            'sale_price'         =>   $abc->sale_price,
            'discount_price'     =>   $abc->discount_price,
            'quentity'           =>   $abc->quentity,
            'measurement_type'   =>   $abc->measurement_type,
            'short_details'      =>   $abc->short_details,
            'full_details'       =>   $abc->full_details,
            'product_size'       =>   $abc->product_size,
            'product_color'      =>   $abc->product_color,
            'stock_status'       =>   $abc->stock_status,
            'status'             =>   $abc->status,
            'admin_id'           =>   Auth()->user()->id,
        );

        $ProductPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($ProductPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$ProductPicture->getClientOriginalExtension();
            Image::make($ProductPicture)->save('public/image/productimage/'.$image_one_name,80);
            $data['image']='public/image/productimage/'.$image_one_name;
            DB::table('productinformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('productinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Product Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


    public function viewallproduct()
    {
        $ProductData = DB::table('productinformation')
        ->leftjoin('iteminformation','iteminformation.id','productinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
        ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
        ->leftjoin('brandinformation','brandinformation.id','productinformation.brand_id')
        ->select('productinformation.*','iteminformation.item_name','categoryinformation.category_name','subcategoryinformation.subcategory_name','brandinformation.brand_name')
        ->get();

        return view('admin.product.viewallproduct',compact('ProductData'));
    }

    
}

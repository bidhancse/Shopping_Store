<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class BrandController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function brand(){
        return view ('admin.brand.brand');
    }


///////////// Insert //////////////


    public function brandinsert(Request $abc) {

        $id = IdGenerator::generate(['table' => 'brandinformation', 'length' => 13, 'prefix' =>'BRAND-']);

        $data = array(
            'id' =>$id,
            'sl' =>$abc->sl,
            'brand_name' =>$abc->brand_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $BrandPicture = $abc->file('image');

        if ($BrandPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$BrandPicture->getClientOriginalExtension();
            Image::make($BrandPicture)->save('public/image/brandimage/'.$image_one_name,80);
            $data['image']='public/image/brandimage/'.$image_one_name;
            DB::table('brandinformation')->insert($data);
        }

        else {
            DB::table('brandinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Brand Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function managebrand(){
        $data = DB::table('brandinformation')->get();
        return view ('admin.brand.managebrand',compact('data'));
    }    


////////// Inactive /////////////


    public function inactivebrand($id)
    {
        DB::table('brandinformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Brand Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Active /////////////


    public function activebrand($id)
    {
        DB::table('brandinformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Brand Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////


    public function branddelete($id)
    {
        $check = DB::table('brandinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('brandinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('brandinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Brand Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////


    public function brandedit($id)
    {
        $data = DB::table('brandinformation')->where('id',$id)->first();
        return view ('admin.brand.editbrand',compact('data'));
    }



    public function brandupdate(Request $abc, $id) {

        $data = array(
            'id' =>$id,
            'sl' =>$abc->sl,
            'brand_name' =>$abc->brand_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $BrandPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($BrandPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$BrandPicture->getClientOriginalExtension();
            Image::make($BrandPicture)->save('public/image/brandimage/'.$image_one_name,80);
            $data['image']='public/image/brandimage/'.$image_one_name;
            DB::table('brandinformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('brandinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Brand Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


}

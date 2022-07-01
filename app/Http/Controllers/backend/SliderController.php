<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class SliderController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function slider(){
        return view('admin.website_setting.slider');
    }


///////////// Insert //////////////


    public function sliderinsert(Request $abc) {

        $id = IdGenerator::generate(['table' => 'sliderinformation', 'length' => 12, 'prefix' =>'SLIDER-']);

        $data = array(
            'id' =>$id,
            'title' =>$abc->title,
            'url' =>$abc->url,
            'admin_id' =>Auth()->user()->id,
        );

        $SliderPicture = $abc->file('image');

        if ($SliderPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$SliderPicture->getClientOriginalExtension();
            Image::make($SliderPicture)->save('public/image/sliderimage/'.$image_one_name,80);
            $data['image']='public/image/sliderimage/'.$image_one_name;
            DB::table('sliderinformation')->insert($data);

        }

        else {
            DB::table('sliderinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Slider Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function manageslider(){
       $data = DB::table('sliderinformation')->get();
       return view('admin.website_setting.manageslider', compact('data'));
   }


////////// Delete /////////////


    public function deleteslider($id)
    {
        $check = DB::table('sliderinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('sliderinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('sliderinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Slider Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////


    public function editslider($id)
    {
        $data = DB::table('sliderinformation')->where('id',$id)->first();
        return view ('admin.website_setting.editslider',compact('data'));
    }


    public function sliderupdate(Request $abc, $id) {

        $data = array(
            'title' =>$abc->title,
            'url' =>$abc->url,
            'admin_id' =>Auth()->user()->id,
        );

        $SliderPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($SliderPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$SliderPicture->getClientOriginalExtension();
            Image::make($SliderPicture)->save('public/image/sliderimage/'.$image_one_name,80);
            $data['image']='public/image/sliderimage/'.$image_one_name;
            DB::table('sliderinformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('sliderinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Slider Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }



}

<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class WebsiteSettingController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


////////// Setting /////////////

    public function setting(){
        $data = DB::table('settinginformation')->first();
        return view('admin.website_setting.setting', compact('data'));
    }

    public function updatesetting(Request $abc, $id) {
        $data = array(
            'admin_id'  => Auth()->user()->id,
            'title'     => $abc->title,
            'email'     => $abc->email,
            'phone'     => $abc->phone,
            'facebook'  => $abc->facebook,
            'twitter'   => $abc->twitter,
            'instagram' => $abc->instagram,
            'youtube'   => $abc->youtube,
        );

        $newimage = $abc->file('image');
        $faviconimage = $abc->file('favicon');
        $oldimage = DB::table('settinginformation')->first();


        if ($newimage) {
            if ($oldimage->image) {
                unlink($oldimage->image);
            }

            $image_one_name= hexdec(uniqid()).'.'.$newimage->getClientOriginalExtension();
            Image::make($newimage)->save('public/image/settingimage/'.$image_one_name,80);
            $data['image']='public/image/settingimage/'.$image_one_name;
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        else{
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        if ($faviconimage) {
            if ($oldimage->favicon) {
                unlink($oldimage->favicon);
            }

            $image_one_name= hexdec(uniqid()).'.'.$faviconimage->getClientOriginalExtension();
            Image::make($faviconimage)->save('public/image/settingimage/'.$image_one_name,80);
            $data['favicon']='public/image/settingimage/'.$image_one_name;
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        else{
            DB::table('settinginformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Setting update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


////////// About /////////////

    public function about(){
        $id = 1;
        $data = DB::table('aboutinformation')->where('id',$id)->first();
        return view('admin.website_setting.about', compact('data'));
    }

    public function aboutupdate(Request $abc, $id) {

        $data = array(

            'details' => $abc->details,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('aboutinformation')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'About Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }



////////// Contact /////////////

    public function contact(){
        $id = 1;
        $data = DB::table('contactinformation')->where('id',$id)->first();
        return view('admin.website_setting.contact', compact('data'));
    }

    public function contactupdate(Request $abc, $id) {

        $data = array(

            'details' => $abc->details,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('contactinformation')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Contact Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


////////// Privacy & Policy /////////////

    public function privacypolicy(){
        $id = '1';
        $data = DB::table('privacypolicy')->where('id',$id)->first();
        return view('admin.website_setting.privacypolicy', compact('data'));
    }

    public function updateprivacypolicy(Request $abc, $id) {

        $data = array(

            'details' => $abc->details,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('privacypolicy')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Privacy & Policy Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


////////// Term & Condition /////////////

    public function termcondition(){
        $id = '1';
        $data = DB::table('termcondition')->where('id',$id)->first();
        return view('admin.website_setting.termcondition', compact('data'));
    }

    public function termconditionupdate(Request $abc, $id) {

        $data = array(

            'details' => $abc->details,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('termcondition')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Term & Condition Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


////////// How to Buy /////////////

    public function howtobuy(){
        $id = '1';
        $data = DB::table('howtobuy')->where('id',$id)->first();
        return view('admin.website_setting.howtobuy', compact('data'));
    }

    public function howtobuyupdate(Request $abc, $id) {

        $data = array(

            'details' => $abc->details,
            'admin_id' => Auth()->user()->id,
        );

        DB::table('howtobuy')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'How to Buy Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


////////// FAQ /////////////

    public function faq(){
        return view('admin.website_setting.faq');
    }


    public function faqinsert(Request $abc) {

        $data = array(
            'question'        => $abc->question,
            'details' => $abc->details,
            'admin_id'  => Auth()->user()->id,
        );

        DB::table('faq')->insert($data);


        $notification=array(
            'messege'=>'FAQ Insert Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


    public function managefaq(){
        $data = DB::table('faq')->get();
        return view('admin.website_setting.managefaq', compact('data'));
    }


    public function deletefaq($id) {

        DB::table('faq')->where('id',$id)->delete();

        $notification=array(
            'messege'=>'FAQ Delete Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


    public function editfaq($id) {
        $data = DB::table('faq')->where('id',$id)->first();
        return view('admin.website_setting.editfaq', compact('data'));
    }


    public function faqupdate(Request $abc, $id) {

        $data = array(
            'question'        => $abc->question,
            'details' => $abc->details,
            'admin_id'  => Auth()->user()->id,
        );

        DB::table('faq')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'FAQ Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 

    }


}

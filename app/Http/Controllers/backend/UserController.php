<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use DB;
Use Image;
Use Auth;
use Hash;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createadmin(){
        return view ('admin.user.createadmin');
    }


///////////// Insert //////////////

    public function usercreate(Request $abc) {


        $data = array(
            'name'     => $abc->name,
            'email'    => $abc->email,
            'phone'    => $abc->phone,
            'address'  => $abc->address,
            'password' =>Hash::make($abc->password),
            'status'   => 1,
            'role_id' => 1,
            'admin_id' => Auth()->user()->id,
        );

        $UserPicture = $abc->file('image');

        if ($UserPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$UserPicture->getClientOriginalExtension();
            Image::make($UserPicture)->save('public/image/userimage/'.$image_one_name,80);
            $data['image']='public/image/userimage/'.$image_one_name;
            DB::table('users')->insert($data);

        }

        else {
            DB::table('users')->insert($data);
        }

        $notification=array(
            'messege'=>'User Create Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////

    public function manageadmin(){
        $data = DB::table('users')->get();
        return view ('admin.user.manageadmin',compact('data'));
    }


////////// Inactive /////////////

    public function inactiveadmin($id)
    {
        DB::table('users')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'User Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Active /////////////

    public function activeadmin($id)
    {
        DB::table('users')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'User Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////

    public function admindelete($id)
    {
        $check = DB::table('users')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('users')->where('id',$id)->delete();
        }

        else {
            DB::table('users')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'User Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////

    public function adminedit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view ('admin.user.editcreateadmin',compact('data'));
    }


    public function usercreateupdate(Request $abc, $id) {


        if($abc->password == Null){
           $data = array(
            'name' => $abc->name,
            'email' => $abc->email,
            'phone' => $abc->phone,
            'address' => $abc->address,
            'status' => 1,
            'role_id' => 1,
            'admin_id' => Auth()->user()->id,
        );
       }

       else{
          $data = array(
            'name' => $abc->name,
            'email' => $abc->email,
            'phone' => $abc->phone,
            'address' => $abc->address,
            'password' =>Hash::make($abc->password),
            'status' => 1,
            'role_id' => 1,
            'admin_id' => Auth()->user()->id,
        );

      }


        $UserPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($UserPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$UserPicture->getClientOriginalExtension();
            Image::make($UserPicture)->save('public/image/userimage/'.$image_one_name,80);
            $data['image']='public/image/userimage/'.$image_one_name;
            DB::table('users')->where('id',$id)->update($data);

        }

        else {
            DB::table('users')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'User Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }







}

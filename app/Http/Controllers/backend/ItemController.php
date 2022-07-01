<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function item(){
        return view ('admin.item.item');
    }


///////////// Insert //////////////


    public function iteminsert(Request $abc) {
        $id = IdGenerator::generate(['table' => 'iteminformation', 'length' => 10, 'prefix' =>'ITEM-']);

        $data = array(
            'id' =>$id,
            'sl' =>$abc->sl,
            'item_name' =>$abc->item_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $itemPicture = $abc->file('image');

        if ($itemPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$itemPicture->getClientOriginalExtension();
            Image::make($itemPicture)->save('public/image/itemimage/'.$image_one_name,80);
            $data['image']='public/image/itemimage/'.$image_one_name;
            DB::table('iteminformation')->insert($data);

        }

        else {
            DB::table('iteminformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Item Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function manageitem(){
        $data = DB::table('iteminformation')->get();
        return view ('admin.item.manageitem',compact('data'));
    }


////////// Inactive /////////////


    public function inactiveitem($id)
    {
        DB::table('iteminformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Item Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Active /////////////


    public function activeitem($id)
    {
        DB::table('iteminformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Item Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////


    public function deleteitem($id)
    {
        $check = DB::table('iteminformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('iteminformation')->where('id',$id)->delete();
        }

        else {
            DB::table('iteminformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Item Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////

    public function edititem($id)
    {
        $data = DB::table('iteminformation')->where('id',$id)->first();
        return view ('admin.item.edititem',compact('data'));
    }


public function itemupdate(Request $abc, $id) {
        

        $data = array(
            'sl' =>$abc->sl,
            'item_name' =>$abc->item_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $itemPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($itemPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$itemPicture->getClientOriginalExtension();
            Image::make($itemPicture)->save('public/image/itemimage/'.$image_one_name,80);
            $data['image']='public/image/itemimage/'.$image_one_name;
            DB::table('iteminformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('iteminformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Item Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }









}

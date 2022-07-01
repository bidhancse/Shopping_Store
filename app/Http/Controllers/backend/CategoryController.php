<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function category(){
        $item = DB::table('iteminformation')->where('status',1)->get();
        return view ('admin.category.category', compact('item'));
    }

///////////// Insert //////////////


    public function categoryinsert(Request $abc) {
        $id = IdGenerator::generate(['table' => 'categoryinformation', 'length' => 10, 'prefix' =>'CATE-']);

        $data = array(
            'id' =>$id,
            'sl' =>$abc->sl,
            'item_id' =>$abc->item_id,
            'category_name' =>$abc->category_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $CategoryPicture = $abc->file('image');

        if ($CategoryPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$CategoryPicture->getClientOriginalExtension();
            Image::make($CategoryPicture)->save('public/image/categoryimage/'.$image_one_name,80);
            $data['image']='public/image/categoryimage/'.$image_one_name;
            DB::table('categoryinformation')->insert($data);

        }

        else {
            DB::table('categoryinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Category Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function managecategory(){
        $data = DB::table('categoryinformation')
        ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
        ->select('categoryinformation.*','iteminformation.item_name')
        ->get();
        return view ('admin.category.managecategory',compact('data'));
    }    


////////// Inactive /////////////


    public function inactivecategory($id)
    {
        DB::table('categoryinformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Category Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Active /////////////


    public function activecategory($id)
    {
        DB::table('categoryinformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Category Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////


    public function deletecategory($id)
    {
        $check = DB::table('categoryinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('categoryinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('categoryinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Category Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////

    public function categoryedit($id)
    {
        $item = DB::table('iteminformation')->where('status',1)->get();
        $data = DB::table('categoryinformation')->where('categoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
        ->select('categoryinformation.*','iteminformation.item_name')
        ->first();
        return view ('admin.category.editcategory',compact('item','data'));
    }


    public function categoryupdate(Request $abc, $id) {

        $data = array(
            'sl' =>$abc->sl,
            'item_id' =>$abc->item_id,
            'category_name' =>$abc->category_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $CategoryPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($CategoryPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$CategoryPicture->getClientOriginalExtension();
            Image::make($CategoryPicture)->save('public/image/categoryimage/'.$image_one_name,80);
            $data['image']='public/image/categoryimage/'.$image_one_name;
            DB::table('categoryinformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('categoryinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Category Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }




}

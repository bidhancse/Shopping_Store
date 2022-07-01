<?php

namespace App\Http\Controllers\backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class SubcategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function subcategory(){
        $item = DB::table('iteminformation')->where('status',1)->get();
        return view('admin.category.subcategory', compact('item'));
    }


//////////// Item-> Category Select /////////////


    public function categoryget($item_id) {

        $data = DB::table('categoryinformation')->where('status',1)->where('item_id',$item_id)->get();
        return json_encode($data);
    }


///////////// Insert //////////////


    public function subcategoryinsert(Request $abc) {

        $id = IdGenerator::generate(['table' => 'subcategoryinformation', 'length' => 12, 'prefix' =>'SUBC-']);

        $data = array(
            'id' =>$id,
            'sl' =>$abc->sl,
            'item_id' =>$abc->item_id,
            'category_id' =>$abc->category_id,
            'subcategory_name' =>$abc->subcategory_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $CategoryPicture = $abc->file('image');

        if ($CategoryPicture) {
            $image_one_name= hexdec(uniqid()).'.'.$CategoryPicture->getClientOriginalExtension();
            Image::make($CategoryPicture)->save('public/image/subcategoryimage/'.$image_one_name,80);
            $data['image']='public/image/subcategoryimage/'.$image_one_name;
            DB::table('subcategoryinformation')->insert($data);

        }

        else {
            DB::table('subcategoryinformation')->insert($data);
        }

        $notification=array(
            'messege'=>'Subcategory Insert Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }


/////////// Data View ////////////


    public function managesubcategory(){
       $data = DB::table('subcategoryinformation')
       ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
       ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
       ->select('subcategoryinformation.*','iteminformation.item_name','categoryinformation.category_name')
       ->get();
       return view('admin.category.managesubcategory', compact('data'));
   }


////////// Inactive /////////////


    public function inactivesubcategory($id)
    {
        DB::table('subcategoryinformation')->where('id',$id)->update(['status' => 0]);

        $notification=array(
            'messege'=>'Subcategory Inactive Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Active /////////////


    public function activesubcategory($id)
    {
        DB::table('subcategoryinformation')->where('id',$id)->update(['status' => 1]);

        $notification=array(
            'messege'=>'Subcategory Active Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


////////// Delete /////////////


    public function deletesubcategory($id)
    {
        $check = DB::table('subcategoryinformation')->where('id',$id)->first();

        if(isset($check->image)) {
            unlink($check->image);

            DB::table('subcategoryinformation')->where('id',$id)->delete();
        }

        else {
            DB::table('subcategoryinformation')->where('id',$id)->delete();
        }

        $notification=array(
            'messege'=>'Subcategory Delete Successfully Done !!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }


////////// Update /////////////


    public function subcategoryedit($id)
    {
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->get();

        $data = DB::table('subcategoryinformation')->where('subcategoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
        ->select('subcategoryinformation.*','iteminformation.item_name','categoryinformation.category_name')
        ->first();
        return view ('admin.category.editsubcategory',compact('item','category','data'));
    }


    public function subcategoryupdate(Request $abc, $id) {

        $data = array(
            'sl' =>$abc->sl,
            'item_id' =>$abc->item_id,
            'category_id' =>$abc->category_id,
            'subcategory_name' =>$abc->subcategory_name,
            'status' =>$abc->status,
            'admin_id' =>Auth()->user()->id,
        );

        $SubCategoryPicture = $abc->file('image');
        $old_image = $abc->old_image;

        if ($SubCategoryPicture) {
            if($old_image) {
                unlink($old_image);
            }
            $image_one_name= hexdec(uniqid()).'.'.$SubCategoryPicture->getClientOriginalExtension();
            Image::make($SubCategoryPicture)->save('public/image/subcategoryimage/'.$image_one_name,80);
            $data['image']='public/image/subcategoryimage/'.$image_one_name;
            DB::table('subcategoryinformation')->where('id',$id)->update($data);

        }

        else {
            DB::table('subcategoryinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Category Update Successfully Done !!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }



}

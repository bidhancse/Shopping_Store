<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class FrontendController extends Controller
{


    public function frontendmethod(){

        $slideractive = DB::table('sliderinformation')->orderBy('id','DESC')->first();
        $slidermore = DB::table('sliderinformation')->orderBy('id','DESC')->skip(1)->limit(4)->get();
        $item = DB::table('iteminformation')->where('status',1)->get();
        $category = DB::table('categoryinformation')->where('status',1)->inRandomOrder()->get();
        $subcategory = DB::table('subcategoryinformation')->where('status',1)->get();
        $setting = DB::table('settinginformation')->first();
        $brand = DB::table('brandinformation')->inRandomOrder()->get();
        $itemname = DB::table('iteminformation')->inRandomOrder()->get();
        return view ('frontend.home', compact('slideractive','slidermore','item','category','subcategory','setting','itemname','brand'));
    }




    public function item($id)
    {
        $ItemProduct = DB::table('productinformation')->where('item_id',$id)->paginate(16);
        $ItemName = DB::table('iteminformation')->where('id',$id)->first();
        $CategoryName = DB::table('categoryinformation')->where('item_id',$id)->get();
        return view('frontend.item.item',compact('ItemProduct','CategoryName','ItemName'));
    }


    public function category($id)
    {
        $CategoryProduct = DB::table('productinformation')->where('category_id',$id)->paginate(16);
        $CategoryName = DB::table('categoryinformation')->where('categoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
        ->select('categoryinformation.*','iteminformation.item_name')
        ->first();
        $SubCategoryName = DB::table('subcategoryinformation')->where('category_id',$id)->get();
        return view('frontend.category.category',compact('CategoryProduct','SubCategoryName','CategoryName'));
    }


    public function subcategory($id)
    {
        $SubCategoryProduct = DB::table('productinformation')->where('subcategory_id',$id)->paginate(16);
        $SubCategoryName = DB::table('subcategoryinformation')->where('subcategoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','subcategoryinformation.item_id')
        ->leftjoin('categoryinformation','categoryinformation.id','subcategoryinformation.category_id')
        ->select('subcategoryinformation.*','iteminformation.item_name','categoryinformation.category_name')
        ->first();
        return view('frontend.subcategory.subcategory',compact('SubCategoryProduct','SubCategoryName'));
    }



    public function product($id)
    {
        $singleproduct = DB::table('productinformation')->where('id',$id)->first();
        $ProductItemName = DB::table('productinformation')->where('productinformation.id',$id)
        ->leftjoin('categoryinformation','categoryinformation.id','productinformation.category_id')
        ->leftjoin('subcategoryinformation','subcategoryinformation.id','productinformation.subcategory_id')
        ->select('productinformation.*','categoryinformation.category_name','subcategoryinformation.subcategory_name')
        ->first();
        $ProductSize = explode(',',$singleproduct->product_size);
        $ProductColor = explode(',',$singleproduct->product_color);
        $ReletedProduct = DB::table('productinformation')->where('category_id',$singleproduct->category_id)->paginate(12);
        return view('frontend.product.singleproduct',compact('singleproduct','ProductItemName','ProductSize','ProductColor','ReletedProduct'));
    }

    public function allproduct()
    {
        $Allproduct = DB::table('productinformation')->paginate(18);
        return view('frontend.product.allproduct',compact('Allproduct'));
    }


    public function allbrand()
    {
        $Allbrand = DB::table('brandinformation')->paginate(24);
        return view('frontend.brand.brand',compact('Allbrand'));
    }


    public function brandproduct($id)
    {
        $BrandProduct = DB::table('productinformation')->where('brand_id',$id)->orderBy('id','DESC')->paginate(16);
        $Brandlist = DB::table('brandinformation')->where('status',1)->get();
        $BrandName = DB::table('brandinformation')->where('id',$id)->first();
        return view('frontend.brand.brandproduct',compact('BrandProduct','Brandlist','BrandName'));
    }


    public function searchproduct(Request $request){

        $search = $request->searchdata;
        $productsearch = DB::table('productinformation')
        ->where('product_name', 'like', '%' . $search . '%')
        ->where('status', 1)->orderBy('id','DESC')
        ->get();
        return view('frontend.searchproduct.searchproduct', compact('productsearch'));
    }



    public function searchbrand(Request $request){

        $search = $request->searchbrand;
        $BrandSearch = DB::table('brandinformation')
        ->where('brand_name', 'like', '%' . $search . '%')
        ->where('status', 1)->orderBy('id','DESC')
        ->get();
        return view('frontend.brand.searchbrand', compact('BrandSearch'));
    }











    public function aboutus()
    {
        $About = DB::table('aboutinformation')->first();
        return view('frontend.websitesetting.about',compact('About'));
    }


    public function termcondition()
    {
        $TermCondition = DB::table('termcondition')->first();
        return view('frontend.websitesetting.termcondition',compact('TermCondition'));
    }


    public function privacypolicy()
    {
        $PrivacyPolicy = DB::table('privacypolicy')->first();
        return view('frontend.websitesetting.privacypolicy',compact('PrivacyPolicy'));
    }


    public function FAQ()
    {
        $FAQ = DB::table('faq')->get();
        return view('frontend.websitesetting.faq',compact('FAQ'));
    }


    public function contactus()
    {   
        $ContactInfo = DB::table('settinginformation')->first();
        return view('frontend.websitesetting.contactus', compact('ContactInfo'));
    }




    
}

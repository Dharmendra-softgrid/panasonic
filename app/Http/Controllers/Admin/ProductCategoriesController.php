<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ProductCategoriesController extends Controller
{
    public function index() {
        $data['productCategories'] = ProductCategory::all();
        return view('admin.products.categories.index',$data);
    }
    public function show() {
        $data['productCategories'] = ProductCategory::all();
        return view('admin.products.categories.index',$data);
    }
    public function create() {
        $data = [];
        return view('admin.products.categories.form',$data);
    }
    public function edit($id) {
        $data['category'] = ProductCategory::find($id); 
        return view('admin.products.categories.form',$data);
    }
    public function store(Request $request) {
        $rules=[
            'title' => 'required|max:255',
            'description' => 'required'            
        ];
        if(!$request->id){
            $rules['bannerimage'] = 'required|mimes:jpeg,png,jpg,gif|max:2048';
        }else{
            $rules['bannerimage'] = 'mimes:jpeg,png,jpg,gif|max:2048';
        }

        $messages=['bannerimage.required'=>'Please upload banner image.'];
        $messages=['bannerimage:mimes'=>'Please upload image type file.'];
        $messages=['bannerimage:max'=>'Please upload a file less than 2MB.'];
        $validated = $request->validate($rules,$messages);

        if(!empty($request->id)){
            $category = ProductCategory::find($request->id);             
            if(!$category){
                return back()->with('error','Category not found.');
            }
        }else{
            $category = new ProductCategory(); 
            $category->slug = str_slug($request->title);
        }
        if($request->file('bannerimage')){
            $fileName   =   time() . uniqid() . '.' . $request->file('bannerimage')->getClientOriginalExtension();
            $res        =   $request->file('bannerimage')->move(public_path() . '/images/' , $fileName);
            $category->banner_image = $fileName;
        }
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->description = $request->description;
        
        $category->save();
        return redirect()->route('productCategory.index')->with('success', "Category saved successfully.");
        
        
    }
    public function destroy(Request $request,$id) {
        $category = ProductCategory::find($id);
        $category->delete();
        return redirect()->route('productCategory.index')->with('success', "Category Deleted successfully.");
    }

    
}

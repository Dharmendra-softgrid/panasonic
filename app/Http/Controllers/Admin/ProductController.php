<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\ProductImages;
use App\ProductVideos;
use App\Industries;
use App\ProductSpecifications;
use App\ProductOtherSpecification;
use App\ProductBlog;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;



class ProductController extends Controller
{
    public function index() {
        $data['products'] = Product::all();
        
        return view('admin.products.index',$data);
    }
    
    public function create() {
        $data = [];
        $data['categories'] = ProductCategory::all();
        $data['industries'] = Industries::all();
        return view('admin.products.form',$data);
    }
    public function edit($id) {
        $data['product'] = Product::find($id); 
        $data['categories'] = ProductCategory::all();
        $data['industries'] = Industries::all();
        return view('admin.products.form',$data);
    }
    public function store(Request $request) {

        //print_r(array_filter( $request->specifications));
        //die;
        // $request->merge([
        //     'specifications' => !empty($request->specifications) ? array_filter($request->specifications) : $request->specifications,
        //     'specificationsvalue' => !empty($request->specificationsvalue) ? array_filter($request->specificationsvalue) : $request->specificationsvalue,            
        //     'resources' => !empty($request->resources) ? array_filter($request->resources) : $request->resources,
        //     'resourcesvalue' => !empty($request->resourcesvalue) ? array_filter($request->resourcesvalue) : $request->resourcesvalue ,
        //     'accessories' => !empty($request->accessories) ? array_filter($request->accessories) : $request->accessories,
        //     'accessoriesvalue' => !empty($request->accessoriesvalue) ? array_filter($request->accessoriesvalue) : $request->accessoriesvalue,
            
        // ]);
        //dd($request->all());
        $messages = array(
            // 'images.required' => 'Atleast 1 image required',
            // 'specifications.required' => 'specification can not be empty',
        );
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'required',
            //'key_features' => 'required',
            //'description' => 'required',
            //'categories' => 'required|array|min:1',
            //'images' => 'required|array|min:1',           
            //'specifications' => 'required|array|min:1',           
        ],$messages);   

        if(!empty($request->id)){
            $product = Product::find($request->id);             
            if(!$product){
                return back()->with('error','Product not found.');
            }
        }else{
            $product = new Product(); 
            $product->slug = str_slug($request->title);
        }

        if($request->file('featuredimage')){
            $fileName   =   time() . uniqid() . '.' . $request->file('featuredimage')->getClientOriginalExtension();
            $res        =   $request->file('featuredimage')->move(public_path() . '/images/' , $fileName);
            $product->featured_image = $fileName;
        }

        $product->title = $request->title;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->key_features = $request->key_features;
        $product->spec_sheet = $request->specesheetvalue;        
        $product->save();
        if(!empty($request->id)){
            $product->product_categories()->detach($request->categories);
        }
        $product->product_categories()->attach($request->categories);
        
        if(!empty($request->id)){
            $product->industries()->detach($request->industries);
        }
        $product->industries()->attach($request->industries);

        if(!empty($request->id)){
            ProductImages::where('product_id',$request->id)->delete();
        }
        //dd($request->images);
        if(!empty($request->images)){
            foreach ($request->images as $key => $image) {
                    $insertarray[] = [
                    'product_id' => $product->id,
                    'image' => $image,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            ProductImages::insert($insertarray);         
        }
        if(!empty($request->speceimage)){
            $product->specificationimage = $request->speceimage;
            $product->save();
        }else{
            $product->specificationimage = "";
            $product->save();
            if(!empty($request->id)){
                ProductSpecifications::where('product_id',$request->id)->where('type','specification')->delete();
            }
            if(!empty($request->specifications)){
                for ($i=0; $i <= count($request->specifications); $i++) { 
                    if(!empty($request->specifications[$i]) && !empty($request->specificationsvalue[$i])){
                        $insertspec[] = [
                            'product_id' => $product->id,
                            'title' => $request->specifications[$i],
                            'value' => $request->specificationsvalue[$i],
                            'type' => 'specification',
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];
                    }                
                } 
                if(!empty($insertspec)){
                    ProductSpecifications::insert($insertspec);         
                }           
            }
         }
        
        $matchtype = [
                    'product_id' => $product->id,
                    'title' => 'specesheet',
                    'type' => 'resource'                        
                ];
        $insertspecsheet = ['value' => !empty($request->specesheet) ? serialize($request->specesheet) : ""];
        ProductSpecifications::updateOrCreate($matchtype,$insertspecsheet);
        
        $matchtype = [
                    'product_id' => $product->id,
                    'title' => 'casestudy',
                    'type' => 'resource'                        
                ];
        $insertspecsheet = ['value' => !empty($request->casestudy) ? serialize($request->casestudy) : ''];
        ProductSpecifications::updateOrCreate($matchtype,$insertspecsheet);
        
        $matchtype = [
                    'product_id' => $product->id,
                    'title' => 'brochures',
                    'type' => 'resource'                        
                ];
        $insertspecsheet = ['value' => !empty($request->brochures) ? serialize($request->brochures) : ""];
        //dd($insertspecsheet);
        //DB::enableQuerylog();
        ProductSpecifications::updateOrCreate($matchtype,$insertspecsheet);        
        //dd(DB::getQuerylog());
        if(!empty($request->id)){
            ProductSpecifications::where('product_id',$request->id)->where('type','accessory')->delete();
        }
        if(!empty($request->accessories)){
            $insertspec=[];
            for ($i=0; $i <= count($request->accessories); $i++) { 
                if(!empty($request->accessories[$i]) && !empty($request->accessoriesvalue[$i])){
                    $insertspec[] = [
                        'product_id' => $product->id,
                        'title' => $request->accessories[$i],
                        'value' => $request->accessoriesvalue[$i],
                        'type' => 'accessory',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }                
            } 
            if(!empty($insertspec)){
                ProductSpecifications::insert($insertspec);         
            }           
        }
        if(!empty($request->id)){
            ProductVideos::where('product_id',$request->id)->delete();
        }
        if(!empty($request->videos)){
            foreach ($request->videos as $key => $video) {
                    $insertvideos[] = [
                    'product_id' => $product->id,
                    'video' => $video,
                    'title' => isset($request->vtitle[$key]) ? $request->vtitle[$key] : '',
                    'description' => isset($request->vdesc[$key]) ? $request->vdesc[$key] : '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            ProductVideos::insert($insertvideos);         
        }
        if(!empty($request->blogtitle)){
            ProductBlog::where('product_id',$request->id)->delete();
        }
        if(!empty($request->blogimage)){
            foreach ($request->blogimage as $key => $image) {
                if(!empty($image)){
                    $insertblogs = [
                        'product_id' => $product->id,
                        'title' => isset($request->blogtitle[$key]) ? $request->blogtitle[$key]:'',
                        'description' => isset($request->blogdescription[$key]) ? $request->blogdescription[$key]:'',
                        'image' => $image,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    ProductBlog::create($insertblogs); 
                }
                    
            }
                    
        }
        if(!empty($request->variant)){
            ProductVariant::where('product_id',$request->id)->delete();
        }
        if(!empty($request->variant)){
            foreach ($request->variant as $key => $v) {
                if(!empty($v)){
                    $insertVariant = [
                        'product_id' => $product->id,
                        'variant' => $v,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    ProductVariant::create($insertVariant); 
                }
                    
            }
                    
        }
        if(!empty($request->specification_title)){
            ProductOtherSpecification::where('product_id',$request->id)->delete();
        }
        if(!empty($request->specification_title)){
            foreach ($request->specification_title as $key => $value) {
                if(!empty($value)){
                    $insertspecf = [
                        'product_id' => $product->id,
                        'title' => isset($request->specification_title[$key]) ? $request->specification_title[$key]:'',
                        'description' => isset($request->specification_description[$key]) ? $request->specification_description[$key]:'',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    ProductOtherSpecification::create($insertspecf); 
                }
                    
            }
                    
        }
        return redirect()->route('product.index')->with('success', "Product saved successfully.");        
        
    }
    public function destroy(Request $request,$id) {
        $product = Product::find($id);
        $product->industries()->detach($request->industries);
        $product->product_categories()->detach($request->industries);
        $product->specifications()->delete();
        $product->videos()->delete();
        if($product->product_images()){
            foreach($product->product_images() as $image){
                unlink(public_path().'/assets/img/product/'.$image);
            }
        }
        $product->product_images()->delete();
        $product->delete();
        return redirect()->back()->with('success', "Product Deleted successfully.");
    }
    public function getspecifications(Request $request) {

        $specifications = ProductSpecifications::select('title as value', 'title as id')->Where('title', 'like', '%' . $request->term . '%')->get();
        
        return response()->json($specifications);
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pages;
use App\ProductCategory;
use App\ProductCategoryMap;
use App\ProductIndustryMap;
use App\Product;
use App\ProductSpecifications;
use App\Newsroom;
use App\Industries;
use App\Settings;
use App\Contacts;
use App\Slider;
use App\Content;
use App\SuccessStories;
use App\DisplaySolution;
use App\ProductImages;
use App\ProductVideos;
use App\ProductBlog;
use App\IndustryImages;
use App\IndustryBlog;
use App\Menu;
use App\Casestudy;
use App\ProductVariant;
use App\ProductOtherSpecification;
use Validator;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // Set a global variable in the constructor
        /* This code gets all menu listed in menu table in the form of array */
        $this->menus =  Menu::with(['children', 'children.displaySolution'])
                            ->where('menu_type', 'header')
                            ->where('parent', 0)
                            ->orderBy('id')
                            ->get();
        $this->industries = Industries::orderBy('id', 'DESC')->paginate(6);
    }
    /* main function */
    public function index(Request $request){
       $data['menus'] = $this->menus;
       $data['industries'] = $this->industries;
       $data['successstories'] = SuccessStories::orderBy('id', 'DESC')->paginate(15);
       $data['newsrooms'] = Newsroom::orderBy('id', 'DESC')->paginate(4);
       $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
       $data['products'] = Product::orderBy('id', 'DESC')->paginate(15);
       $data['sliders'] = $data['sliders'] = Slider::orderBy('id', 'DESC')->where('type', 'HOME')->paginate(15);
       $data['first_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'first_section')->where('page', 'HOME')->first();
       $data['second_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'second_section')->where('page', 'HOME')->first();
       $data['third_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'third_section')->where('page', 'HOME')->first();
       $data['fourth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'fourth_section')->where('page', 'HOME')->first();
       $data['fifth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'fifth_section')->where('page', 'HOME')->first();
       $data['sixth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'sixth_section')->where('page', 'HOME')->first();
       return view('home', $data);
    }

    public function successStory(Request $request){ 
        $data['menus'] = $this->menus;
        $data['successstories'] = SuccessStories::orderBy('id', 'DESC')->paginate(15);        
        $data['sliders'] = Slider::orderBy('id', 'DESC')->where('type', 'SUCCESS_STORY')->paginate(15);          
        $data['industries'] = $this->industries;
        return view('successstory', $data);
    }

    public function successStoryDetail(Request $request, $slug){
        $data['menus'] = $this->menus;
        //var_dump($slug);
        //$data['successstories'] = SuccessStories::orderBy('id', 'DESC')->paginate(15);
        $data['successstory'] = SuccessStories::where('slug', $slug)->first();        
        //dd([$data['successstory']->toSql(),$data['successstory']->getBindings()]);
        $data['sliders'] = Slider::orderBy('id', 'DESC')->where('type', 'SUCCESS_STORY')->paginate(15);
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        return view('successstorydetail', $data);
    }

    public function newsRoom(Request $request){ 
        $data['menus'] = $this->menus;
        $data['newsrooms'] = Newsroom::orderBy('id', 'DESC')->paginate(15);        
        $data['sliders'] = Slider::orderBy('id', 'DESC')->where('type', 'NEWS_ROOM')->paginate(15); 
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        return view('newsroom', $data);
    }

    public function newsRoomDetail(Request $request, $slug){
        $data['menus'] = $this->menus;
        //var_dump($slug);
        //$data['successstories'] = SuccessStories::orderBy('id', 'DESC')->paginate(15);
        $data['newsrooms'] = Newsroom::inRandomOrder()->take(3)->get();
        $data['newsrooms'] = new \Illuminate\Pagination\LengthAwarePaginator($data['newsrooms'], count($data['newsrooms']), 15);
        $newsroom = Newsroom::where('slug', $slug)->first();
        $data['newsroom'] = $newsroom;
        // get previous user id
        $data['previous'] = Newsroom::where('id', '<', $newsroom->id)->orderBy('id','desc')->first();
        // get next user id
        $data['next'] = Newsroom::where('id', '>', $newsroom->id)->orderBy('id','asc')->first();
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        //dd([$data['successstory']->toSql(),$data['successstory']->getBindings()]);
        //$data['sliders'] = Slider::orderBy('id', 'DESC')->where('type', 'NEWS_ROOM')->paginate(15);        
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        return view('newsroomdetail', $data);
    }

    public function productDetail(Request $request, $slug){    
        $data['menus'] = $this->menus;
        $product = Product::where('slug', $slug)->first();
        $data['product'] = $product;
        $data['productImages'] = ProductImages::orderBy('id', 'DESC')->where('product_id', $product->id)->get();
        $data['productBrochures'] = ProductSpecifications::where('title', 'brochures')->where('product_id', $product->id)->get();
        $productCategoryIdArr = ProductCategoryMap::where('product_id', $product->id)->groupBy('product_category_id')->pluck('product_category_id')->toArray();
        $productIdArr = ProductCategoryMap::whereIn('product_category_id', $productCategoryIdArr)->where('product_id','!=', $product->id)->pluck('product_id')->toArray();
        $data['relatedProducts'] = Product::whereIn('id', $productIdArr)->get();
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        $data['productBlog'] = ProductBlog::orderBy('id', 'DESC')->where('product_id', $product->id)->get();
        $data['productVariant'] = ProductVariant::orderBy('id', 'DESC')->where('product_id', $product->id)->get();
        $data['productSpecification'] = ProductSpecifications::orderBy('id', 'DESC')->where('product_id', $product->id)->where('type', 'specification')->get();
        $data['ProductOtherSpecification'] = ProductOtherSpecification::orderBy('id', 'DESC')->where('product_id', $product->id)->get();
        //dd([$data['successstory']->toSql(),$data['successstory']->getBindings()]);               
        return view('productdetail', $data);
    }

    public function industryDetail(Request $request, $slug){ 
        $data['menus'] = $this->menus;
        $industry = Industries::where('slug', $slug)->first();
        $data['industry'] = $industry;
        $data['sliders'] =  Slider::orderBy('id', 'DESC')->where('type', 'INDUSTRY_DETAIL')->paginate(15);
        $data['galleryImages'] = IndustryImages::orderBy('id', 'DESC')->where('industry_id', $industry->id)->get();
        //$data['productBrochures'] = ProductSpecifications::where('title', 'brochures')->where('product_id', $product->id)->get();
        $productIdArr = ProductIndustryMap::where('industry_id', $industry->id)->groupBy('product_id')->pluck('product_id')->toArray();
        //$productIdArr = ProductCategoryMap::whereIn('product_category_id', $productCategoryIdArr)->where('product_id','!=', $product->id)->pluck('product_id')->toArray();
        $data['relatedProducts'] = Product::whereIn('id', $productIdArr)->get();
        $data['industries'] = Industries::orderBy('id', 'DESC')->where('id','!=', $industry->id)->get();
        //dd([$data['successstory']->toSql(),$data['successstory']->getBindings()]);   
        $data['IndustryBlog'] = IndustryBlog::orderBy('id', 'DESC')->where('industry_id', $industry->id)->get();            
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        return view('industrydetail', $data);
    }
    public function aboutus(Request $request){ 
        $data['menus'] = $this->menus;
        $data['first_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'first_section')->where('page', 'ABOUT')->first();
        $data['second_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'second_section')->where('page', 'ABOUT')->first();
        $data['third_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'third__section')->where('page', 'ABOUT')->first();
        $data['fourth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'fourth_section')->where('page', 'ABOUT')->first();
        $data['fifth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'fifth_section')->where('page', 'ABOUT')->first();
        $data['sixth_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'sixth_section')->where('page', 'ABOUT')->first();
        $data['seventh_sec_content'] = Content::orderBy('id', 'DESC')->where('section_type', 'seventh_section')->where('page', 'ABOUT')->first();
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        $data['slider'] = Slider::orderBy('id', 'DESC')->where('type', 'ABOUTUS')->first();
        return view('aboutus',$data);
    }
    public function displaysolutions(Request $request, $slug){ 
        $data['menus'] = $this->menus;
        $data['displaysolutions'] = DisplaySolution::where('slug', $slug)->first();
        $data['industries'] = $this->industries;
        return view('displaysolutions',$data);
    }
    public function casestudy(Request $request){
        $data['menus'] = $this->menus;
        $data['industries'] = $this->industries;
        $data['displaysolutions'] = DisplaySolution::orderBy('id', 'DESC')->paginate(15);
        $data['slider'] = Slider::orderBy('id', 'DESC')->where('type', 'CASESTUDY')->first();
        $data['casestudies'] = Casestudy::orderBy('id', 'DESC')->paginate(15);
        return view('casestudy', $data);
    }
    public function casestudydetails(Request $request, $slug){
        $data['menus'] = $this->menus;
        $data['industries'] = Industries::orderBy('id', 'DESC')->paginate(6);
        $data['displaysolutions'] = $this->industries;
        $data['slider'] = Slider::orderBy('id', 'DESC')->where('type', 'CASESTUDYDETAILS')->first();
        $data['casestudies'] = Casestudy::orderBy('id', 'DESC')->paginate(15);
        $data['casestudiesdetails'] = Casestudy::where('slug', $slug)->first();
        $data['product'] = Product::inRandomOrder()->take(4)->get();
        $data['products'] = new \Illuminate\Pagination\LengthAwarePaginator($data['product'], count($data['product']), 15);
        return view('casestudydetails', $data);
    }
}

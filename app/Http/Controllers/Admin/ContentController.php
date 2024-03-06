<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Content;
use App\IndustryImages;
use App\IndustryVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| ContentController
|--------------------------------------------------------------------------
|
| Here is where you can create, update, fetch, delete content for your application.
|
*/ 
class ContentController extends Controller
{
    public function index() {

        $data['contents'] = Content::orderBy('id', 'DESC')->paginate(15);
        return view('admin.content.index',$data);
    }
    public function create() {

        $data[] = [];
        return view('admin.content.form',$data);
    }
    public function edit($id) {
        $data['content'] = Content::find($id); 
        return view('admin.content.form',$data);
    }
    public function store(Request $request) {
        //dd($request->file('bannerimage'));
        $messages = array(
            //'images.required' => 'Atleast 1 image required',
        );
        
        $rules=[
            'title' => 'required|max:255',           
            'section_type' => 'required',
            'page' => 'required'
        ];
        if($request->file('bannerimage')){
            $rules['bannerimage'] = 'mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $validated = $request->validate($rules,$messages);


        if(!empty($request->id)){
            $content = Content::find($request->id);
            
            if(!$content){
                return back()->with('error','Content not found.');
            }
            if(empty($content->slug)) {
                //$industry->slug = str_slug($request->title);
            }
        }else{
            $content = new Content(); 
            //$content->slug = str_slug($request->title);
            
        }
        if($request->file('bannerimage')){
            $fileName   =   time() . uniqid() . '.' . $request->file('bannerimage')->getClientOriginalExtension();
            $res        =   $request->file('bannerimage')->move(public_path() . '/images/' , $fileName);
            $content->image = $fileName;
        }
        $content->title = $request->title;
        // $industry->meta_title = $request->meta_title;
        // $industry->meta_keywords = $request->meta_keywords;
        // $industry->meta_description = $request->meta_description;
        $content->content = $request->content;
        $content->page = $request->page;
        $content->status = '1';        
        $content->section_type = $request->section_type;
        $content->save();      

        return redirect()->route('content.index')->with('success', "Content saved successfully.");
        
        
    }
    public function destroy(Request $request,$id) {
        $category = Content::find($id);
        $category->delete();
        return redirect()->route('content.index')->with('success', "Content deleted successfully.");
    }

    
}

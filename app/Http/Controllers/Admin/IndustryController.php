<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Industries;
use App\IndustryImages;
use App\IndustryVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class IndustryController extends Controller
{
    public function index() {

        $data['industries'] = Industries::orderBy('id', 'DESC')->paginate(15);
        return view('admin.industries.index',$data);
    }
    public function create() {

        $data[] = [];
        return view('admin.industries.form',$data);
    }
    public function edit($id) {
        $data['industry'] = Industries::find($id); 
        return view('admin.industries.form',$data);
    }
    public function store(Request $request) {
        //dd($request->file('bannerimage'));
        $messages = array(
            'images.required' => 'Atleast 1 image required',
        );
        
        $rules=[
            'title' => 'required|max:255',
            'content' => 'required',
            'images' => 'required|array|min:1',         
        ];
        if($request->file('bannerimage')){
            $rules['bannerimage'] = 'mimes:jpeg,png,jpg,gif|max:2048';
        }
        $validated = $request->validate($rules,$messages);


        if(!empty($request->id)){
            $industry = Industries::find($request->id);
            
            if(!$industry){
                return back()->with('error','industry not found.');
            }
            if(empty($industry->slug)) {
                $industry->slug = str_slug($request->title);
            }
        }else{
            $industry = new Industries(); 
            $industry->slug = str_slug($request->title);
            
        }
        if($request->file('bannerimage')){
            $fileName   =   time() . uniqid() . '.' . $request->file('bannerimage')->getClientOriginalExtension();
            $res        =   $request->file('bannerimage')->move(public_path() . '/images/' , $fileName);
            $industry->banner_image = $fileName;
        }
        $industry->title = $request->title;
        $industry->meta_title = $request->meta_title;
        $industry->meta_keywords = $request->meta_keywords;
        $industry->meta_description = $request->meta_description;
        $industry->content = $request->content;
        $industry->save();

        if(!empty($request->id)){
            IndustryImages::where('industry_id',$request->id)->delete();
            IndustryVideos::where('industry_id',$request->id)->delete();
        }
        //dd($request->images);
        if(!empty($request->images)){
            foreach ($request->images as $key => $image) {
                    $insertarray[] = [
                    'industry_id' => $industry->id,
                    'image' => $image,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
                IndustryImages::insert($insertarray);
         
        }
        if(!empty($request->videos)){
            foreach ($request->videos as $key => $videos) {
                    $insertvideos[] = [
                    'industry_id' => $industry->id,
                    'video' => $videos,
                    'title' => isset($request->vtitle[$key]) ? $request->vtitle[$key] : '',
                    'description' => isset($request->vdesc[$key]) ? $request->vdesc[$key] : '',
                    'type' => 'youtube',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
                IndustryVideos::insert($insertvideos);
         
        }

        return redirect()->route('industry.index')->with('success', "Industry saved successfully.");
        
        
    }
    public function destroy(Request $request,$id) {
        $category = Industries::find($id);
        $category->delete();
        return redirect()->route('industry.index')->with('success', "Industry Deleted successfully.");
    }

    
}

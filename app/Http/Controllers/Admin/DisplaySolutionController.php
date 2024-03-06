<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DisplaySolution;
use App\Settings;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| DisplaySolutionController
|--------------------------------------------------------------------------
| Author : Dharmendra Upadhyay
| Last Commited :28/02/2024
| Controller for creating, updating, fetching, and deleting display solutions for the application..
|
*/
class DisplaySolutionController extends Controller
{
    /**
    * Display a listing of the display solutions.
    *
    * @return \Illuminate\View\View
    */
    public function index() {
        $data['menus'] = Menu::where('type','page.solutions')->get();  
        $data['displaysolutions'] = DisplaySolution::paginate(10);
        return view('admin.displaysolution.index',$data);
    }
    /**
     * Display the form for managing the banner.
     *
     * @return \Illuminate\View\View
     */
    public function banner() {
        $data['banner'] = Settings::where('type','newsroom')->where('skey','banner')->first();        
        return view('admin.displaysolution.banner',$data);
    }
    /**
    * Store the banner image in the settings.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function bannerstore(Request $request) {
        $rules['bannerimage'] = 'required|mimes:jpeg,png,jpg,gif|max:2048';        
        $messages = array(            
        );
        $validated = $request->validate($rules,$messages);   
        if($request->file('bannerimage')){
            $fileName   =   time() . uniqid() . '.' . $request->file('bannerimage')->getClientOriginalExtension();
            $res        =   $request->file('bannerimage')->move(public_path() . '/images/' , $fileName);
            
            Settings::updateOrCreate(
                ['type' => 'displaysolution', 'skey' => 'banner'],
                ['svalue' => $fileName]
            );
            return redirect()->back()->with('success', "Banner saved successfully.");
        }else{
            return redirect()->back()->with('error', "please upload banner image");
        }
        
    }
    
    public function create() {
        $data = [];
        $data['menus'] = Menu::where('type','page.solutions')->get();  
        return view('admin.displaysolution.form',$data);
    }
    public function edit($id) {
        $data['menus'] = Menu::where('type','page.solutions')->get();  
        $data['displaysolution'] = DisplaySolution::find($id); 
        
        return view('admin.displaysolution.form',$data);
    }
    public function store(Request $request) {
        $title = Menu::where('id',$request->menu_id)->value('title');
        $rules = [
            'short_description' => 'required',            
            'content' => 'required',            
        ];
        if(!$request->id){
            $rules['image'] = 'required|mimes:jpeg,png,jpg,gif|max:10000';
        }
        $messages = array(
            
        );
        $validated = $request->validate($rules,$messages);   
        if(!$request->id){
            if (DisplaySolution::where('slug', '=', str_slug($title))->exists()) {
               return redirect()->back()->withInput($request->input())->with('error','Display Solution already exists.');
            }
        }
        
        

        if(!empty($request->id)){
            $displaysolution = DisplaySolution::find($request->id);             
            if(!$displaysolution){
                return back()->with('error','Display Solution  not found.');
            }
        }else{
            $displaysolution = new DisplaySolution(); 
            $displaysolution->slug = str_slug($title);
        }
        if($request->file('image')){
            $fileName   =   time() . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $res        =   $request->file('image')->move(public_path() . '/images/' , $fileName);
            $displaysolution->image = $fileName;
        }
        $displaysolution->title = $title;
        $displaysolution->menu_id = $request->menu_id;
        $displaysolution->meta_title = $request->meta_title;
        $displaysolution->meta_keywords = $request->meta_keywords;
        $displaysolution->meta_description = $request->meta_description;
        $displaysolution->content = $request->content;
        $displaysolution->short_description = $request->short_description;
        $displaysolution->active = '1';
        $displaysolution->save();
        
        return redirect()->route('displaysolution.index')->with('success', "Display Solution saved successfully.");        
        
    }
    public function destroy(Request $request,$id) {
        $newsroom = DisplaySolution::find($id);
        $newsroom->delete();
        return redirect()->back()->with('success', "Display Solution Deleted successfully.");
    }
    

    
}

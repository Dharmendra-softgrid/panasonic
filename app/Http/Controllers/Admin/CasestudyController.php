<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Casestudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class CasestudyController extends Controller
{
    public function index() {

        $data['casestudies'] = Casestudy::orderBy('id', 'DESC')->paginate(15);
        return view('admin.casestudy.index',$data);
    }
    public function create() {

        $data[] = [];
        return view('admin.casestudy.form',$data);
    }
    public function edit($id) {
        $data['casestudy'] = Casestudy::find($id); 
        return view('admin.casestudy.form',$data);
    }
    public function store(Request $request) {
        //dd($request->file('bannerimage'));
        //dd($request->all());
        $messages = array(
            'filename.required' => 'Please upload pdf.',
            'filename.required_if' => 'Please upload pdf.',
            'videourl.required_if' => 'Please enter youtube video url.',
        );
        
        $rules=[
            'title' => 'required|max:255',
                  
        ];
        if($request->type == 'pdf'){
           $rules['filename']="required|mimes:pdf"; 
        }else{
           $rules['videourl']=[
            'required',
            'url',
            function ($attribute, $value, $fail) {
                if (!preg_match('/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/', $value)) {
                    $fail("Not valid youtube url.");
                }
            },
        ];  
        }
        
        $validated = $request->validate($rules,$messages);


        if(!empty($request->id)){
            $casestudy = Casestudy::find($request->id);
            
            if(!$casestudy){
                return back()->with('error','case study not valid.');
            }
           
        }else{
            $casestudy = new Casestudy(); 
            
            
        }
        if($request->type == 'pdf'){
            $fileName   =   $request->file('filename')->getClientOriginalName();
            $res        =   $request->file('filename')->move(public_path() . '/casestudy/' , $fileName);
            $casestudy->filename = $fileName;
        }else{
            $casestudy->video = $request->videourl;
        }
        $casestudy->name = $request->title;
        
        $casestudy->save();
        return redirect()->route('casestudy.index')->with('success', "Case study saved successfully.");
    }
    public function destroy(Request $request,$id) {
        $category = Casestudy::find($id);
        $category->delete();
        return redirect()->route('casestudy.index')->with('success', "Casestudy Deleted successfully.");
    }

    
}

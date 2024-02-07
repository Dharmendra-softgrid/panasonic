<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Contacts;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ContactusController extends Controller
{
    public function Settings() {
        $contactSettings = Settings::where('type','contact')->get();
        
        if($contactSettings->isNotEmpty()){
            $data = $contactSettings->pluck('svalue','skey');
        }
       
        
        return view('admin.contact.settings',$data);
    }

    public function list() {
        
       $data['contacts']=Contacts::orderBy('id','DESC')->paginate(15);
        
        return view('admin.contact.index',$data);
    }
    public function export() {
        
       $contacts=DB::table('contacts')->select(DB::raw("CONCAT(fname,' ',lname) as name"),'email','phone','city','comment','quantity','ind.title as industry','pc.title as category',DB::raw("DATE_FORMAT(contacts.created_at,'%d %b %Y %H:%i:%s') as date"))
       ->leftJoin('industries as ind','ind.id','=','contacts.industry')
       ->leftJoin('product_category as pc','pc.id','=','contacts.category')
       ->orderBy('contacts.id','DESC')->get()->toarray();
       $fileName = 'contacts.csv';
       $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

       $columns = array('Name', 'Email', 'Phone', 'Comment', 'City','Quantity','Industry','Category','Date');

       
            $file = fopen(public_path($fileName), 'w');
            fputcsv($file, $columns);
            foreach ($contacts as $contact) {
                fputcsv($file, (array)$contact);
            }

            fclose($file);
       

        return response()->download(public_path($fileName) , $fileName, $headers);
        
        
    }
    
    
    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',                   
            'desc' => 'required',                   
        ]); 

        $setting = Settings::firstOrNew(array('type' => 'contact','skey' => 'email'));
        $setting->svalue = $request->email;
        $setting->save();  

        $setting = Settings::firstOrNew(array('type' => 'contact','skey' => 'mobile'));
        $setting->svalue = $request->mobile;
        $setting->save();

        $setting = Settings::firstOrNew(array('type' => 'contact','skey' => 'address'));
        $setting->svalue = $request->address;
        $setting->save();

        $setting = Settings::firstOrNew(array('type' => 'contact','skey' => 'description'));
        $setting->svalue = $request->desc;
        $setting->save();  


        
        return redirect()->route('contact.settings')->with('success', "Contact Settings saved successfully.");        
        
    }
    
    
}

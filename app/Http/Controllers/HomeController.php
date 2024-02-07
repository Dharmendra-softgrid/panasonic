<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pages;
use App\ProductCategory;
use App\Product;
use App\ProductSpecifications;
use App\Newsroom;
use App\Industries;
use App\Settings;
use App\Contacts;
use Validator;
use DB;

class HomeController extends Controller
{
    
    public function index(Request $request){
       return view('home');
    }
    
}

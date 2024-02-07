<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\ProductImages;
use App\ProductCategory;
use App\ProductVideos;
use App\ProductSpecifications;
use App\ProductBlog;


class Casestudy extends Model
{
    
    protected $table = 'case_study';
    public $timestamps = false;
    protected $fillable = ['name','filename','video'];
    protected $searchable = [
        
    ];

    
}

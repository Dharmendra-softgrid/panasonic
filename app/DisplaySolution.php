<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\ProductImages;
use App\ProductCategory;
use App\ProductVideos;
use App\ProductSpecifications;
use App\ProductBlog;
use App\Menu;
use App\ProfessionalDisplaySolution;


class DisplaySolution extends Model
{
    
    protected $table = 'display_solution';
    protected $fillable = ['id','title','slug','meta_title','meta_keywords','meta_description','content','image','short_description','menu_id'];
    protected $searchable = [
        
    ];
    public function menu() {
        return $this->hasMany(Menu::class,'id', 'menu_id');
    }
    public function ProfessionalDisplaySolution() {
        return $this->hasMany(ProfessionalDisplaySolution::class,'id', 'solution_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalDisplaySolution extends Model
{
    protected $table = 'professional_display_solution';
    protected $fillable = ['id','solution_id','title','slug','meta_title','meta_keywords','meta_description','short_description','content','image'];

    public function DisplaySolution(){
        return $this->belongsTo(DisplaySolution::class,'solution_id','id');
    }
}

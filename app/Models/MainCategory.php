<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class MainCategory extends Model
{
    protected $table = 'main_categories';


    protected $fillable = [
       'translation_lang',
       'translation_of' ,
       'name',
       'abbr' ,
       'slug',
       'photo' ,
       'active' ,
       'created_at' ,
       'updated_at',
    ];


    // للربط مع observe
    protected static function boot() {

        parent::boot();
        MainCategory::observe(MainCategoryObserver::class);
    }

    public function getPhotoAttribute($val) {

        return ($val !== null) ? asset( 'assets/' .$val) : "";
    }


    public function getActive() {

        return  $this -> active == 1 ? 'مفعل' : 'غير مفعل';
    }


    // public function scopSelection($query) {
    //     // return $query -> select('id' ,'translation_lang', 'name', 'slug' ,'photo', 'active' , 'translation_of') ;
    // }


    // get all translation categories
    public function categories() {

      return  $this ->hasMany(self::class , 'translation_of');
    }

    public function vendors() {

        return $this ->hasMany(Vendor::class);
    }

    public function SubCategories() {

        return  $this ->belongsTo(SubCategory::class);
    }





    public function scopDefaultCategory($query) {

        return $query ->where('translation_of' , 0);
    }



}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainCategory;

class SubCategory extends Model
{
    protected $table = 'sub_categories';


    protected $fillable = [
       'translation_lang',
       'translation_of' ,
       'name',
       'abber' ,
       'direction',
       'status' ,
       'active' ,
       'category_id' ,
       'created_at' ,
       'updated_at',
    ];


    public function getPhotoAttribute($val) {

        return ($val !== null) ? asset( 'assets/' .$val) : "";
    }

    public function getActive() {

        return  $this -> active == 1 ? 'مفعل' : 'غير مفعل';
    }

    // public function scopSelection($query) {
    //     return $query -> select('id' , 'parent_id' , 'translation_lang', 'name', 'slug' ,'photo', 'active' , 'translation_of') ;
    // }

    // get all translation categories
    public function categories() {

        return  $this ->hasMany(self::class , 'translation_of');
      }

    // get all category of subcategories
    public function mainCategories() {

        return  $this ->hasMany(MainCategory::class);

    }
}

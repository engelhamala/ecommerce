<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';


    protected $fillable = [
        'name',
        'abbr' ,
        'direction',
        // 'status' ,
        'active' ,
        'created_at' ,
        'updated_at',
    ];



    public function scopActive($query) {
        return $query -> where('active' , 1);
    }


    public function scopSelection($query) {
        return $query -> select('id' , 'abbr' , 'name' , 'direction' , 'active') ;
    }


    public function getActive() {

      return  $this -> active == 1 ? 'مفعل' : 'غير مفعل';
    }


}

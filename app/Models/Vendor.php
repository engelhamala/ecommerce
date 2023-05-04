<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{

    use Notifiable;

    protected $table = 'vendors';

    protected $fillable = [
       'phone' ,
       'name',
       'password',
       'address' ,
       'email',
       'category_id' ,
       'logo' ,
       'active' ,
       'created_at' ,
       'updated_at',
    ];

    protected $hidden = ['category_id', 'password'];


    public function scopActive($query) {

        return $query -> where('active' , 1);

    }


    public function getLogoAttribute($val) {

        return ($val !== null) ? asset( 'assets/' .$val) : "";
    }

    public function getActive() {

        return  $this -> active == 1 ? 'مفعل' : 'غير مفعل';
    }

    // public function scopSelection($query) {

    //     return $query -> select( 'id', 'phone' , 'name', 'active' , 'category_id' , 'logo' , 'address' , 'email') ;

    // }

    public function category() {

        return $this ->belongsTo(MainCategory::class);
    }


    public function setpasswordAttribute($password) {

        if(!empty($password)) {

            $this -> attributes['password'] = bcrypt($password);
        }
    }
}



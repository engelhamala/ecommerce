<?php
use Illuminate\Support\Facades\Config;


function get_languages() {

   return \App\Models\Language::where('active' , 1) -> all();
}


function get_default_lang() {

    return config::get('app.locale');
}


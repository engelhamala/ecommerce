<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoriesController extends Controller
{

    public function index()
    {
        $default_lang = get_default_lang();

        $subcategories =  SubCategory::all()->where('translation_lang', $default_lang);

        return view('admin.subcategory.index', compact('subcategories'));
    }


    public function create()
    {
        return view('admin.maincategory.create');
    }

}

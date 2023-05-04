<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use DB;


class MainCategoriesController extends Controller
{
    public function index()
    {
        $default_lang = get_default_lang();
        $categories =  MainCategory::all()->where('translation_lang', $default_lang);
        return view('dashboard.maincategory.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.maincategory.create');
    }

    public function store(MainCategoryRequest $request)
    {
        try {

            $main_categories = collect($request->category);

            $filter =  $main_categories->filter(function ($value, $key) {

                return $value['abbr'] == get_default_lang();
            });

            $default_category = array_values($filter->all())[0];

            DB::beginTransaction();

            $default_category_id = MainCategory::insertGetId([

                'translation_lang' => $default_category['abbr'],

                'translation_of' => 0,

                'name' => $default_category['name'],

                'slug' => $default_category['name'],

                'photo' =>  request()->file('photo')->store('maincategory'),

                'abbr' => ''
            ]);


            $categories =  $main_categories->filter(function ($value, $key) {

                return $value['abbr'] != get_default_lang();
            });


            if (isset($categories) && $categories->count()) {

                $categories_arr = [];

                foreach ($categories as $category) {

                    $categories_arr[] = [

                        'translation_lang' => $category['abbr'],

                        'translation_of' =>  $default_category_id,

                        'name' => $category['name'],

                        'slug' => $category['name'],

                        'photo' =>  request()->file('photo')->store('maincategory'),

                        'abbr' => ''
                    ];
                }
                MainCategory::insert($categories_arr);
            }


            DB::commit();

            return redirect()->route('dashboard.maincategories')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('dashboard.maincategories')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $maincategory)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MainCategory $maincategory)
    {
        return view('dashboard.maincategory.edit', compact('maincategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainCategoryRequest $request, MainCategory $maincategory)
    {

        // try {
            $category =  array_values($request->category)[0];

            if (!$request->has('category.0.active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

                $maincategory->update([
                    'name' => $category['name'],
                    'active' => $request->active
                ]);


            // save image
            // if ($request->has('photo')) {

            //     $filepath = uploadImage('maincategories', $request->photo);

            //     MainCategory::where('id', $mainCat_id)
            //         ->update([

            //             'photo' => $filepath
            //         ]);
            // }
            return redirect()->route('dashboard.maincategories')->with(['success' => 'تم التعديل بنجاح']);
        // } catch (\Exception $ex) {

        //     DB::rollback();

        //     return redirect()->route('dashboard.maincategories')->with(['error' => 'حدث خطأ ما']);
        // }
    }


    public function destroy(MainCategory $maincategory)
    {
        // try {
            $vendors = $maincategory->vendors();

            if (isset($vendors) &&  $vendors->count() > 0) {

                return redirect()->route('dashboard.maincategories')->with(['success' => ' لايمكن حذف هذا القسم']);
            }

            // delete image from folder

            // $image =  Str::after($maincategory->photo, 'assets');

            // $image = base_path('assets' . $image);

            // unlink($image);

            $maincategory->categories()->delete();

            $maincategory->delete();

            return redirect()->route('dashboard.maincategories')->with(['success' => ' تم حذف القسم بنجاح']);
        // } catch (\Exception $ex) {

        //     return redirect()->route('dashboard.maincategories')->with(['error' => 'حدث خطأ ما الرجاء المحاولة لاحقا']);
        // }
    }


    public function changStatus(MainCategory $maincategory)
    {

        try {
            $status = $maincategory->active == 0 ? 1 : 0;

            $maincategory->update(['active' => $status]);

            return redirect()->route('dashboard.maincategories')->with(['success' => ' تم تغيير الحالة  بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('dashboard.maincategories')->with(['error' => 'حدث خطأ ما الرجاء المحاولة لاحقا']);
        }
    }
}

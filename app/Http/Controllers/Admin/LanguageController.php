<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {

        // $language = Language::select('id' , 'abbr' , 'name' , 'direction' , 'active') ->paginate();
        $language = Language::all();
        return view('dashboard.languages.index', compact('language'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request, Language $lang)
    {

        // print($request ->except(['_token']));
        // Language::create($request ->except(['_token']));
        // dd($request->validated());
        try {
            // Language::create([
            //     'name' => $request->name,
            //     'abbr' => $request->abbr,
            //     'direction' => $request->direction
            // ]);
            Language::create($request->validated());

            return redirect()->route('dashboard.languages')->with(['success' =>  'تمت الاضافة بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('dashboard.languages')->with(['error' => 'حدث خطأ ما']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Language $lang)
    {
        return view('dashboard.languages.show', compact('lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $lang)
    {
        return view('dashboard.languages.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Language $lang)
    {
        // update in db

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);

        $lang->update($request->except('_token'));
        $save = $lang->save();
        if ($save) {
            return redirect()->route('dashboard.languages')->with(['success' =>  'تمت التعديل بنجاح']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $lang)
    {
        $lang->delete();
        if ($lang) {
            return redirect()->route('dashboard.languages')->with(['success' => ' تم حذف اللغة بنجاح']);
        }
    }
}

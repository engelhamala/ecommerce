<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use Illuminate\Support\Str;
use DB;


class VendorsController extends Controller
{
    public function index()
    {
        // $vendors = Vendor::select()->paginate(PAGINATION_COUNT);
        $vendors = Vendor::all();
        return view('dashboard.vendors.index', compact('vendors'));
    }


    public function create()
    {
        $categories = MainCategory::where('translation_of', 0)->where('active', 1)->get();
        return view('dashboard.vendors.create', compact('categories'));
    }


    public function store(VendorRequest $request)
    {
        // dd($request->validated());
        // try {
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        $data =$request->validated();
        $data['logo'] = request()->file('logo')->store('vendor');
        $vendor = Vendor::create($data);


        Notification::send($vendor, new VendorCreated($vendor));
        return redirect()->route('dashboard.vendor')->with(['success' => 'تم الحفظ بنجاح']);
        // } catch (\Exception $ex) {

        //     // return $ex;
        //     return redirect()->route('admin.vendors')->with(['error' => 'حدث خطأ ما']);
        // }
    }


    public function show(Vendor $vendor)
    {
        //
    }


    public function edit(Vendor $vendor)
    {
        $categories = MainCategory::where('translation_of', 0)->where('active', 1)->get();

        return view('dashboard.vendors.edit', compact('vendor', 'categories'));
    }

    public function update(VendorRequest $request, Vendor $vendor)
    {
        try {
            DB::beginTransaction();

            // save logo
            // if ($request->has('logo')) {
            //     $filepath = uploadImage('vendors', $request->logo);
            //     $vendor->update([
            //             'logo' => $filepath
            //         ]);
            // }
            $data = $request->except('_token', 'password', 'logo', 'id');
            if ($request->has('password')) {

                $data['password'] = $request->password;
            }
            $vendor->update($data);
            DB::commit();
            return redirect()->route('dashboard.vendor')->with(['success' => '  تم التحديث بنجاح']);
        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('dashboard.vendor')->with(['error' => 'حدث خطأ ما']);
        }
    }


    public function destroy(Vendor $vendor)
    {
            // delete image from folder

            // $image =  Str::after($vendor->logo, 'assets');

            // $image = base_path('assets' . $image);

            // unlink($image);

            $vendor->delete();

            return redirect()->route('dashboard.vendor')->with(['success' => ' تم حذف المتجر بنجاح']);
    }


    public function changStatus(Vendor $vendor)
    {
        try {
            $status = $vendor->active == 0 ? 1 : 0;

            $vendor->update(['active' => $status]);

            return redirect()->route('dashboard.vendor')->with(['success' => ' تم تغيير الحالة  بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('dashboard.vendor')->with(['error' => 'حدث خطأ ما الرجاء المحاولة لاحقا']);
        }
    }
}

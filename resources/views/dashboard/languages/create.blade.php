@extends('dashboard.layouts.app')

@section('content')
    <div class="widget-box">
        <div class="widget-header">
            <h5 class="widget-title"> إضافة لغة جديدة</h5>
            <!-- #section:custom/widget-box.toolbar -->
            <div class="widget-toolbar">

                {{-- <a href="{{ route('admin.news.create') }}" class="btn btn-xs btn-primary">
                    <i class="ace-icon fa fa-plus "></i>
                    إضافة
                </a> --}}
            </div>
        </div>


        <form class="form-horizontal" role="form" method="post" action="{{ route('dashboard.store-languages') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> اسم اللغة </label>
                            <input type="text" value="" name="name" id="name" class="form-control"
                                placeholder="ادخل اسم اللغة">

                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="abbr"> الاختصار </label>
                            <input type="text" value="" name="abbr" id="abbr" class="form-control"
                                placeholder="ادخل اختصار اللغة" >
                            <span class="text-danger"> </span>

                            @error('abbr')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direction"> الاتجاة </label>
                            <select name="direction" id="direction" class="select2 form-control">
                                <optgroup label="من فضلك أختر اتجاه اللغة ">
                                    <option value="rtl">من اليمين الي اليسار</option>
                                    <option value="rtl">من اليسار الي اليمين</option>
                                </optgroup>
                            </select>

                            @error('direction')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <input type="checkbox" name="active" id="active" class="switchery" value="1" data-color="success"
                                checked />
                            <label for="active" class="card-title ml-1">الحالة </label>

                            @error('active')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                </button>
                <button type="submit" class="btn btn-primary" name="save">
                    <i class="la la-check-square-o"></i> حفظ
                </button>
            </div>
        </form>
    </div>
@endsection

@extends('dashboard.layouts.app')

@section('content')
    <div class="widget-box">
        <div class="widget-header">
            <h5 class="widget-title"> تعديل لغة </h5>
            <!-- #section:custom/widget-box.toolbar -->
            <div class="widget-toolbar">

            </div>
        </div>



        <form class="form-horizontal" role="form" method="post"
            action="{{ route('dashboard.update-languages', $lang->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"> اسم اللغة </label>
                                    <input type="text" value="{{ $lang->name }}" name="name" id="name"
                                        class="form-control" placeholder="ادخل اسم اللغة">

                                    <span class="text-danger"> </span>
                                    @error('name')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="abbr"> الاختصار </label>
                                    <input type="text" value="{{ $lang->abbr }}" name="abbr" id="abbr"
                                        class="form-control" placeholder="ادخل اختصار اللغة">
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
                                            <option value="rtl" @if ($lang->direction == 'rtl') selected @endif>من
                                                اليمين الي اليسار</option>
                                            <option value="ltr" @if ($lang->direction == 'ltr') selected @endif>من
                                                اليسار الي اليمين</option>
                                        </optgroup>
                                    </select>
                                    <span class="text-danger"> </span>

                                    @error('direction')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-1">
                                    <input type="checkbox" name="active" id="active" class="switchery" value="1"
                                        data-color="success" @if ($lang->active == 1) checked @endif />
                                    <label for="active" class="card-title ml-1">الحالة </label>
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

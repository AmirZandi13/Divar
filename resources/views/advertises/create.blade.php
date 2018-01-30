@extends('layouts.master')

@section('script')

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد اگهی</h2>
        </div>
        <form class="form-horizontal" action="/user/advertise/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">دسته بندی</label>

                        <select name="category_id" id="type" class="form-control">
                            @foreach($categories as $category)
                            <option value={{$category->id}}>{{$category->name}}</option>
                            @endforeach
                        </select>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">شهر</label>

                    <select name="location_id" id="type" class="form-control">
                        @foreach($cities as $city)
                            <option value={{$city->id}}>{{$city->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان اگهی</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیحات مقاله را وارد کنید">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر اگهی</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="تصویر مقاله را وارد کنید" value="{{ old('imageUrl') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">قیمت</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="قیمت را وارد کنید" value="{{ old('price') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection
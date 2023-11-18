@extends('vendor.layouts.master')
@section('content')
    <!--=============================
            DASHBOARD START
            ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.slidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Shop profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.shop-profile.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="">Preview</label><br>
                                        <img src="{{ asset($profile->banner) }}" alt="" width="150px">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Banner</label>
                                        <input type="file" class="form-control" name="banner">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Shop Name</label>
                                        <input type="text" class="form-control" name="shop_name"
                                            value="{{ $profile->shop_name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $profile->phone }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $profile->email }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $profile->address }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Description</label><br>
                                        <textarea name="description" class="summernote form-control">{{ $profile->description }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Facebook</label><br>
                                        <input type="text" class="form-control" name="fb_link"
                                            value="{{ $profile->fb_link }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Twitter</label>
                                        <input type="text" class="form-control" name="tw_link"
                                            value="{{ $profile->phonetw_link }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" name="insta_link"
                                            value="{{ $profile->phoneinsta_link }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            DASHBOARD START
            ==============================-->
@endsection

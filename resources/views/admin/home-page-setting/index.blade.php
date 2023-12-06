@extends('admin.layouts.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Home Page Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-profile-list"
                                            data-toggle="list" href="#list-profile" role="tab">Popular Category
                                            Section</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                            data-toggle="list" href="#list-messages" role="tab">Category Product Section
                                            One</a>
                                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                                            data-toggle="list" href="#list-settings" role="tab">Category Product Section
                                            Two</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="nav-tabContent">
                                        @include('admin.home-page-setting.section.popular-category-section')

                                        @include('admin.home-page-setting.section.product-slider-section-one')

                                        @include('admin.home-page-setting.section.product-slider-section-two')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

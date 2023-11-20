@extends('vendor.layouts.master')
@section('content')
    {{-- Dashboard Start --}}
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.slidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <a href="{{ route('vendor.products-variant.index', ['product' => $product->id]) }}"
                        class="btn btn-warning mb-3"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Product Variant Item</h3>
                        <h6>Variant: {{ $variant->name }}</h6>
                        <div class="d-flex flex-row-reverse mb-3">
                            <a href="{{ route('vendor.products-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                                class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create Variant Item</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Dashboard Start --}}
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.products-variant-item.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush

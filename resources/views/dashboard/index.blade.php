@extends('layouts.app')

@section('header-title')
Dashboard
@endsection
@section('header-scripts')
{{-- <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script> --}}
<script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/dashboard_boxed.js') }}"></script>

@endsection
@section('header-scripts')
  <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/demo_pages/blog_single.js') }}"></script>
@endsection


@section('page-content')
<div class="card">
    <div class="card-header header-elements-sm-inline">
        <h1 class="card-title">Simple Library Store Admin System</h1>
        <div class="header-elements">
        </div>
    </div>

    <div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
        <div class="d-flex align-items-center mb-4 mb-md-0">
            
            <div class="ml-4">
                <h5 class="font-weight-bold mb-0">{{ $books }} </h5>
                <h5>Total Books</h5>
            </div>
        </div>

        <div class="d-flex align-items-center mb-4 mb-md-0">
            
            <div class="ml-4">
                <h5 class="font-weight-bold mb-0">{{ $staffs }}</h5>
                <h5>Total Staffs</h5>
            </div>
        </div>

        <div class="d-flex align-items-center mb-4 mb-md-0">
            <div class="ml-4">
                <h5 class="font-weight-bold mb-0">{{ $sales }}</h5>
                <h5>Total Sales</h5>
            </div>
        </div>

    </div>

    
</div>

@endsection
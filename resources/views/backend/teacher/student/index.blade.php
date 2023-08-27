@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Student Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    {{-- <a href="{{ route('admin.student.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Create
                    </a> --}}
                    <a href="{{ url('admin/student/import') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Import
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

@extends('backend.layouts.app')
@push('style')
    <link href="{{ asset('assets/admin/css') }}/select2.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Create Note</h3>
            </div>
        </div>
        {!! Form::open(['route' => 'teacher.note.store', 'files' => true, 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        @include('backend.teacher.note.form', ['formAction' => 'Save'])
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/select2.full.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js') }}/subject.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            getFaculties();
        });
    </script>
@endpush


@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Create Subject</h3>
            </div>
        </div>
        {!! Form::open(['route' => 'admin.subject.store', 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        @include('backend.admin.subject.form', ['formAction' => 'Save'])
        {!! Form::close() !!}
    </div>
@endsection

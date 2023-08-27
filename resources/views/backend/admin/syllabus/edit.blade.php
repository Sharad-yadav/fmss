@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                <h3 class="kt-portlet__head-title">Edit Syllabus</h3>
            </div>
        </div>
        {!! Form::model($syllabus, [
            'route' => ['admin.syllabus.update', $syllabus->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.admin.syllabus.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection

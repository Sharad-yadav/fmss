@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                <h3 class="kt-portlet__head-title">Edit Student</h3>
            </div>
        </div>
        {!! Form::model($student, [
            'route' => ['admin.student.update', $student->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.admin.user.student.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection

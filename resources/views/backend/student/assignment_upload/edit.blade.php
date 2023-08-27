@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                <h3 class="kt-portlet__head-title">Edit Note</h3>
            </div>
        </div>
        {!! Form::model($assignment, [
            'route' => ['student.assignment_upload.update', $assignment->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.student.assignment_upload.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection

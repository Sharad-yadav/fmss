@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                <h3 class="kt-portlet__head-title">Edit Submission</h3>
            </div>
        </div>
        {!! Form::model($submission, [
            'route' => ['student.assignment.update', $submission->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
            'files' => true
        ]) !!}
            @include('backend.student.assignment.form', ['formAction' => 'Update'])
        {!! Form::close() !!}
    </div>
@endsection

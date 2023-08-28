@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Assignment Details</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">By:</label>
                <div class="col-lg-2">
                    <p class="form-control-static">{{ $assignment->teacher->user->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Subject:</label>
                <div class="col-lg-2">
                    <p class="form-control-static">{{ $assignment->subject->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Assignment:</label>
                <div class="col-lg-2">
                    <a href="{{ Illuminate\Support\Facades\Storage::url($assignment->file) }}" target="_blank">{{ $assignment->assignments }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Submissions Listing</h3>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Submitted On</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse($assignment->submissions as $submission)
                        <tr>
                            <td>
                                <a href="{{ Illuminate\Support\Facades\Storage::url($submission->file) }}" target="_blank">{{ $submission->name }}</a>
                            </td>
                            <td>
                                {{ $submission->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                <a href="{{ route('student.assignment.edit', $submission->id) }}" class="btn btn-sm btn-primary">
                                    <i class="la la-edit"></i>Edit
                                </a>
                                <a href="{{ route('student.assignment.destroy', $submission->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                                    <i class="la la-trash"></i>Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"> No Submissions Found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        </div>

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Assignment Submission</h3>
            </div>
        </div>
            {!! Form::open(['route' => 'student.assignment.store', 'files' => true, 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
                {!! Form::hidden('assignment_id', $assignment->id) !!}
                @include('backend.student.assignment.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
    </div>
@endsection

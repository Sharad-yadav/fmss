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
            <div class="row">
                    <label class="col-lg-1">Assignment:</label>
                    <div class="col-lg-3">
                        <a href="{{ Illuminate\Support\Facades\Storage::url($assignment->file) }}" target="_blank">{{ $assignment->assignments }}</a>
                    </div>
            </div>
            <div class="row">
                <label class="col-lg-1">Faculty:</label>
                <div class="col-lg-3">
                    {{ $assignment->section->faculty->name ?? null }}
                </div>
            </div>
            <div class="row">
                <label class="col-lg-1">Section:</label>
                <div class="col-lg-3">
                    {{ $assignment->section->semester->name ?? null }}
                </div>
            </div>
            <div class="row">
                <label class="col-lg-1">Subject:</label>
                <div class="col-lg-3">
                    {{ $assignment->subject->name ?? null }}
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Assignment Listing</h3>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table class="table table-striped">
                <thead>
                <th>Name</th>
                <th>Submitted By</th>
                <th>Submitted On</th>
                </thead>
                <tbody>
                @forelse($assignment->submissions as $submission)
                    <tr>
                        <td>
                            <a href="{{ Illuminate\Support\Facades\Storage::url($submission->file) }}" target="_blank">{{ $submission->name }}</a>
                        </td>
                        <td>
                            {{ $submission->student->user->name ?? null }}
                        </td>
                        <td>
                            {{ $submission->created_at->format('M d, Y') }}
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
@endsection

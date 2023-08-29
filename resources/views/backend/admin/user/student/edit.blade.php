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
@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/select2.full.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js') }}/subject.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var selectedFacultyId = @json($student->faculty_id ?? null);
            var selectedSemesterId = @json($student->semester_id ?? null);
            var selectedFaculty = @json(getSelectedFaculty($student->faculty_id ?? null));
            var selectedSemester = @json(getSelectedSemester($student->semester_id ?? null));
            var selectedSection = @json(getSelectedSection($student->section_id ?? null));
            getFaculties(selectedFaculty)
            getSemesterByFaculty(selectedFacultyId, selectedSemester);
            getSectionBySemester(selectedSemesterId, selectedSection);
        });
    </script>
@endpush

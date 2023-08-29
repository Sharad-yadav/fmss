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
                <h3 class="kt-portlet__head-title">Edit Syllabus</h3>
            </div>
        </div>
        {!! Form::model($syllabus, [
            'route' => ['admin.syllabus.update', $syllabus->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
            'files' => true
        ]) !!}
        @include('backend.admin.syllabus.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/select2.full.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js') }}/subject.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var selectedFacultyId = @json($syllabus->semester->faculty_id ?? null);
            var selectedSemesterId = @json($syllabus->semester_id ?? null);
            var selectedFaculty = @json(getSelectedFaculty($syllabus->semester->faculty_id ?? null));
            var selectedSemester = @json(getSelectedSemester($syllabus->semester_id ?? null));
            var selectedSubject = @json(getSelectedSubject($syllabus->subject_id ?? null));
            getFaculties(selectedFaculty)
            getSemesterByFaculty(selectedFacultyId, selectedSemester);
            getSubjectBySemester(selectedSemesterId, selectedSubject);
        });
    </script>
@endpush


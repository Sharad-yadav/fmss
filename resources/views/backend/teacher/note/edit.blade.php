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
                <h3 class="kt-portlet__head-title">Edit Note</h3>
            </div>
        </div>
        {!! Form::model($note, [
            'route' => ['teacher.note.update', $note->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
            'files' => true,
        ]) !!}
        @include('backend.teacher.note.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/select2.full.js" type="text/javascript"></script>
    <script src="{{ asset('assets/teacher/js') }}/subject.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var selectedFacultyId = @json($note->subject->semester->faculty_id ?? null);
            var selectedSemesterId = @json($note->subject->semester_id ?? null);
            var selectedFaculty = @json(getSelectedFaculty($note->subject->semester->faculty_id ?? null));
            var selectedSemester = @json(getSelectedSemester($note->subject->semester_id ?? null));
            var selectedSubject = @json(getSelectedSubject($note->subject_id ?? null));
            getFaculties(selectedFaculty)
            getSemesterByFaculty(selectedFacultyId, selectedSemester);
            getSubjectBySemester(selectedSemesterId, selectedSubject);
        });
    </script>
@endpush

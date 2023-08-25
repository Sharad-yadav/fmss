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
        {!! Form::model($note, [
            'route' => ['teacher.note.update', $note->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.teacher.note.form', ['formAction' => 'Update'])

        {!! Form::close() !!}
    </div>
@endsection
@push('scripts')
    <script>
        {{--$(document).ready(function () {--}}
        {{--    var selectedFacultyId = @json($school->province_id ?? null);--}}
        {{--    var selectedDistrictId = @json($school->district_id ?? null);--}}
        {{--    var selectedDistrict = @json(getSelectedDistrict($school->district_id ?? null));--}}
        {{--    var selectedMunicipality = @json(getSelectedMunicipality($school->municipality_id ?? null));--}}
        {{--    getSemesterByFaculty(selectedProvinceId, selectedDistrict);--}}
        {{--    getSubjectBySemester(selectedDistrictId, selectedMunicipality);--}}
        {{--});--}}
    </script>
    <script src="{{ asset('assets/teacher/js') }}/subject.js" type="text/javascript"></script>
@endpush

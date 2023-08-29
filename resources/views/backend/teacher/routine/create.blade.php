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
                <h3 class="kt-portlet__head-title">Create Routine</h3>
            </div>
        </div>
        {!! Form::open(['route' => 'teacher.routine.store', 'files' => true, 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        @include('backend.teacher.routine.form', ['formAction' => 'Save'])
        {!! Form::close() !!}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/select2.full.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#semester').select2({
                placeholder: 'Select Semester',
                allowClear: true,
            });
            $('#section').select2({
                placeholder: 'Select Section',
                allowClear: true,
            });
            $('#semester').change(function () {
                var semesterId = $(this).val();
                getSectionBySemester(semesterId);
            });
            function getSectionBySemester(semesterId, defaultSelected = null) {
                var sections = $('#section').select2({
                    placeholder: 'Select Section',
                    allowClear: true,
                    ajax: {
                        url: "/general/semester/" + semesterId + '/sections',
                        'dataType': 'json',
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (obj) {
                                    return {
                                        id: obj.id,
                                        text: obj.text
                                    };
                                })
                            }
                        }
                    },
                }).val(defaultSelected).trigger('change');

                if (defaultSelected) {
                    $.each(defaultSelected, function (key, data) {
                        var option = new Option(data.text, data.id, true, true);
                        sections.append(option);
                    })
                    sections.trigger('change');
                }
            }
        });
    </script>
@endpush




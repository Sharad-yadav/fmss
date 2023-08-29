@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Syllabus Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">

                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="syllabus-table">
                <thead>
                <tr>
                    <th>#</th>


                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>File</th>


                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#syllabus-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('teacher.syllabus.index') }}",
                columns: [
                    { data: 'id', name: 'id' },

                    { data: 'semester', name: 'semester.faculty.name' },
                    {data: 'subject.name', name: 'subject.name'},
                    { data: 'name', name: 'name' },
                    { data: 'file', name: 'file' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

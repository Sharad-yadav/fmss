@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Assignments Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('student.assignment_upload.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Upload Assignment
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="assignment-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Batch</th>
                    <th>Faculty</th>
                    <th>Teacher</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Assignments</th>
                    <th>Submission Date</th>
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
            var table = $('#assignment-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.assignment_upload.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    {data: 'batch.batch_year', name: 'batch.batch_year'},
                    { data: 'section.semester.faculty.name', name: 'section.semester.faculty.name' },
                    { data: 'teacher.user.name', name: 'teacher.user.name' },
                    {data: 'section.semester.name',name:'section.semester.name'},
                    { data: 'section.name', name: 'section.name' },
                    { data: 'subject.name', name: 'subject.name' },
                    {data: 'assignments', name: 'assignments'},
                    { data: 'submission_date', name: 'submission_date' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

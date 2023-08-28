@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Assignments_upload Listing</h3>
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
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="assignment_upload-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th>name</th>
                    <th>Assignment_Upload</th>

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
            var table = $('#assignment_upload-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.assignment_upload.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'student.user.name', name: 'student.user.name' },
                    {data: 'assignment.assignments', name: 'assignment.assignments'},
                    { data: 'name', name: 'name' },
                    {data: 'file', name: 'file'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

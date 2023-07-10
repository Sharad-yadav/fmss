@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">
                    Teacher Listing
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ url('admin/teacher/create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                id="teacher-table"
                width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Faculty</th>
                        <th>Phone</th>
                        <th>Salary</th>
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
            var table = $('#teacher-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.teacher.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'user.email', name: 'user.email'},
                    {data: 'faculty.name', name: 'faculty.name'},
                    {data: 'user.number', name: 'user.number'},
                    {data: 'salary', name: 'salary'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush




@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Student Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.student.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="student-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Faculty</th>
                    <th>Batch</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Phone</th>
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
            var table = $('#student-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.student.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'faculty.name', name: 'faculty.name' },
                    { data: 'batch.batch_year', name: 'batch.batch_year' },
                    { data: 'semester.name', name: 'semester.name' },
                    { data: 'section.name', name: 'section.name' },
                    { data: 'user.number', name: 'user.number' },

                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

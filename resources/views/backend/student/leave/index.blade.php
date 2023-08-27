@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Note Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('student.leave.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="leave-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Leave Type</th>
                    <th>Leave Upload</th>
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
            var table = $('#leave-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.leave.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'student.user.name', name: 'student.user.name' },
                    { data: 'leave_type', name: 'leave_type' },
                    { data: 'file', name: 'file' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

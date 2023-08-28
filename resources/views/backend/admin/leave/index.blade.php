@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Leave Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">

                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="leave-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Leave Type</th>
                    <th>Description</th>
                    <th>Date</th>
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
                ajax: "{{ route('admin.leave.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.roles.name', name: 'user.roles.name' },
                    { data: 'leave_type_id', name: 'leave_type_id' },
                    { data: 'description', name: 'description' },
                    { data: 'date', name: 'date' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

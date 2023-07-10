@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">batch Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.semester.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover" id="semester-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Faculty</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#semester-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.semester.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'faculty.name', name: 'faculty.name' },
                    {data: 'name', name: 'name'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush

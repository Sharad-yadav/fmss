@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Grade listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.grade.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover" id="grade-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Batch</th>
                    <th>Faculty</th>
                    <th>Semester</th>
                    <th>Section</th>
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
            var table = $('#grade-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.grade.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'batch.batch_year', name: 'batch.batch_year' },
                    { data: 'faculty.name', name: 'faculty.name' },
                    { data: 'semester.name', name: 'semester.name' },
                    { data: 'section.name', name: 'section.name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush

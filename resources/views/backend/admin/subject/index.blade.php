@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Subject listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.subject.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover" id="subject-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Semester</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Credit_Hour</th>
                    <th> Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#subject-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.subject.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'semester', name: 'semester.faculty.name' },
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'credit_hour', name: 'credit_hour'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush

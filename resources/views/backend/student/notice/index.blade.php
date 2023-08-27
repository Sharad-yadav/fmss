@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Notice Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                   
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="notice-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>File</th>
                    <th>Posted For</th>
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
            var table = $('#notice-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.notice.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    {data: 'name', name: 'name'},
                    { data: 'file', name: 'file' },
                    {data: 'for', name: 'for'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

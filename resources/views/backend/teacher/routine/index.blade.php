@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Routine Listing</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    @if(getAuthTeacher('is_hod'))
                        <a href="{{ route('teacher.routine.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="routine-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Batch</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Name</th>
                    <th> File</th>
                    @if(getAuthTeacher('is_hod'))
                        <th style="text-align: center">Actions</th>
                    @endif
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
            var columns = @json(getAuthTeacher('is_hod')) ?
                [
                    { data: 'id', name: 'id' },
                    { data: 'batch.batch_year', name: 'batch.batch_year' },
                    { data: 'semester.name', name: 'semester.name' },
                    { data: 'section.name', name: 'section.name' },
                    { data: 'name', name: 'name' },
                    { data: 'file', name: 'file' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ] :
                [
                    { data: 'id', name: 'id' },
                    { data: 'batch.batch_year', name: 'batch.batch_year' },
                    { data: 'semester.name', name: 'semester.name' },
                    { data: 'section.name', name: 'section.name' },
                    { data: 'name', name: 'name' },
                    { data: 'file', name: 'file' },
            ];
            var table = $('#routine-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('teacher.routine.index') }}",
                columns: columns
            });
        });
    </script>
@endpush

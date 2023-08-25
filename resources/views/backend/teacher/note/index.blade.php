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
                    <a href="{{ route('teacher.note.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="note-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Faculty</th>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Note</th>
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
            var table = $('#note-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('teacher.note.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'subject.semester.faculty.name', name: 'subject.semester.faculty.name' },
                    { data: 'subject.semester.name', name: 'subject.semester.name' },
                    { data: 'subject.name', name: 'subject.name' },
                    { data: 'notes', name: 'notes' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush

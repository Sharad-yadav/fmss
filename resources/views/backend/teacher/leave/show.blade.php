@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Leave Details</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Leave Type:</label>
                <div class="col-lg-2">
                    <p class="form-control-static">{{ $leave->leave_type_id }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Description:</label>
                <div class="col-lg-2">
                    <p class="form-control-static">{{ $leave->description }}</p>
                </div>
            </div>
        </div>

        </div>
    @endsection

@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Student Details</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Name:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->user->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Email:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->user->email }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Faculty:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->faculty->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Batch:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->batch->batch_year }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Semester:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->semester->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Section:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->section->name}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Phone:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $student->user->number }}</p>
                </div>
            </div>

            <!-- Add other teacher details here -->
        </div>
    </div>
@endsection

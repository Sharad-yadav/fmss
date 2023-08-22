@extends('backend.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"></span>
                <h3 class="kt-portlet__head-title">Subject Details</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Semester:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $subject->semester->semester }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Code:</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $subject->code }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Subject Name :</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{  $subject->name}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">Credit_Hour</label>
                <div class="col-lg-10">
                    <p class="form-control-static">{{ $subject->credit_hour }}</p>
                </div>
            </div>


            <!-- Add other teacher details here -->
        </div>
    </div>
@endsection

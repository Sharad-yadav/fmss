@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Semester</h3>
            </div>
        </div>
        <div>
            <h4 class="kt-portlet__head-title"> Name: {{ $semester->name }}</h4><br>
            <h4> Faculty: {{ $semester->faculty_id }}</h4><br>


        </div>
    @endsection

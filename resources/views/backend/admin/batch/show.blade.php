@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Batch</h3>
            </div>
        </div>
        <div>
            <h4 class="kt-portlet__head-title"> Batch_Year: {{ $batch->batch_year }}</h4><br>


        </div>
    @endsection

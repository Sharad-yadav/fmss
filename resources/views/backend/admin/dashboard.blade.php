@extends('backend.layouts.app')
@section('content')
<div class="kt-portlet" id="kt_portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="flaticon-calendar-2"></i>
            </span>
            <h3 class="kt-portlet__head-title">
               FSM Events
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <a href="#" class="btn btn-brand btn-elevate">
                <i class="la la-plus"></i>
                Add Event
            </a>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div id="kt_calendar"></div>
    </div>
</div>
@endsection






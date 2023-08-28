@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Personal Information
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('teacher.profile.edit', frontUser('id')) }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Edit
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body">
                    <div class="form-group row">
                        <div class="offset-md-1 col-lg-6 col-xl-6">
                            <img src="{{ getImageUrl(\App\Constants\RoleConstant::TEACHER_ID) }}" style="height:140px; width:140px; border-radius: 50%;" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9 col-xl-6">
                            <label class="col-form-label ">{{ frontUser('name') }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9 col-xl-6">
                            <label class="col-form-label ">{{ frontUser('email') }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Contact</label>
                        <div class="col-lg-9 col-xl-6">
                            <label class="col-form-label ">{{ frontUser('number') }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-9 col-xl-6">
                            <a href="#"> Change Password ? </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

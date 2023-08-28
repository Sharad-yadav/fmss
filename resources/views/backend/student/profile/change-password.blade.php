@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Change Password
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
        </div>
        {!! Form::open(['route' => 'student.password.change', 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-lg-9 col-xl-6">
                            {!! Form::password('current_password', ['class' => $errors->first('current_password') ? 'form-control  is-invalid' : 'form-control']) !!}
                            @error('current_password')
                            <div class="error invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                        <div class="col-lg-9 col-xl-6">
                            {!! Form::password('password', ['class' => $errors->first('password') ? 'form-control  is-invalid' : 'form-control']) !!}
                            @error('password')
                            <div class="error invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
                        <div class="col-lg-9 col-xl-6">
                            {!! Form::password('password_confirmation', ['class' => $errors->first('password_confirmation') ? 'form-control  is-invalid' : 'form-control']) !!}
                            @error('password_confirmation')
                            <div class="error invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-3 col-xl-3">
                    </div>
                    <div class="col-lg-9 col-xl-9">
                        <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                        <a href="{{ route('student.profile.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

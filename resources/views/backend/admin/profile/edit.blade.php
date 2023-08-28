@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Personal Information
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
        </div>
        {!! Form::model($profile, [
            'route' => ['admin.profile.update', $profile->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
            'files' => true
        ]) !!}
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9 col-xl-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                {!! Form::text('email', null, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Contact</label>
                            <div class="col-lg-9 col-xl-6">
                                {!! Form::text('number', null, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                            <div class="col-lg-9 col-xl-6">
                                {!! Form::file('image', ['class' => 'form-control']) !!}
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
                        <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

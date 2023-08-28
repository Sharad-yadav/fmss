@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Import Student</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ url('admin/student/export') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Export Sample
                    </a>
                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'admin.student.import', 'class' => 'kt-form kt-form--label-right', 'method' => 'post', 'files' => true]) !!}
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <p>While importing, please use following constants for faculties</p>
                        @foreach(\App\Constants\FacultyConstant::faculties as $faculty)
                            <h6>{{ $faculty['id'] }} for {{ $faculty['name'] }}</h6>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="name" class="mb-3">Import File</label>
                        <br>
                        {!! Form::file('file', ['class' => '']) !!}
                        <br>
                        @error('file')  <p style="color:red" >
                            {{ $message }}</p>
                        @enderror
                        @if(isset($failures))
                            @foreach ($failures as $failure)
                                @foreach($failure->errors() as $error)
                                    <p class="mt-2" style="color:red;">{{ $error  }} at row {{ $failure->row()  }} </p>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.student.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

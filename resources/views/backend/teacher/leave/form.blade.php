<div class="kt-portlet__body">
    <div class="form-group row">
{{--        <div class="col-lg-6">--}}
{{--            <label for="student">Student</label>--}}
{{--            {!! Form::text('student_id', $students, null, ['class' => 'form-control']) !!}--}}
{{--            @error('student_id')--}}
{{--            {{ $message }}--}}
{{--            @enderror--}}
{{--        </div>--}}
        <div class="col-lg-6">
            <label for="leave type">Leave Type</label>
            {!! Form::select('leave_type',$leaves ,null, ['class' => 'form-control ']) !!}
            @error('leave_type')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">

     <div class="col-lg-6">
        <label for="leave"> Leave Upload</label>
        {!! Form::file('file', ['class' => 'form-control']) !!}
        @error('file')
        {{ $message }}
        @enderror
     </div>
    </div>
</div>




<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-9 ml-lg-auto">
                 <button type="submit" class="btn btn-brand">{{ $formAction }}</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>

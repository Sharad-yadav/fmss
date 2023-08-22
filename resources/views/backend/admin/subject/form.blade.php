<div class="kt-portlet__body">
    <div class="form-group row">

        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id',$semesters, null, ['class' => 'form-control']) !!}
            @error('semester_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="code">Code</label>
            {!! Form::text('code',null, ['class' => 'form-control']) !!}
            @error('code')
            {{ $message }}
            @enderror
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name">Name</label>
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="Credit">Credit_Hour</label>
            {!! Form::text('credit_hour', null, ['class' => 'form-control']) !!}
            @error('credit_hour')
            {{ $message }}
            @enderror
        </div>


    </div>


</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="#" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>



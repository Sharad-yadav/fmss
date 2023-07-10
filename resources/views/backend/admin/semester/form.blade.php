<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="faculty">Faculty</label>
            {!! Form::select('faculty_id',$faculties, null, ['class' => 'form-control']) !!}
            @error('faculty_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
            @error('name')
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



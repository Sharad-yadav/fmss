<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="batch">Batch</label>
            {!! Form::select('batch_id',$batches, null, ['class' => 'form-control']) !!}
            @error('batch_id')
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="faculty">Faculty</label>
            {!! Form::select('faculty_id',$faculties, null, ['class' => 'form-control']) !!}
            @error('faculty_id')
            {{ $message }}
            @enderror
        </div>


    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id',$semesters, null, ['class' => 'form-control']) !!}
            @error('semester_id')
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="section">Section</label>
            {!! Form::select('section_id',$sections, null, ['class' => 'form-control']) !!}
            @error('section_id')
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



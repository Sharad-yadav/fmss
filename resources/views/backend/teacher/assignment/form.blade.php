<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="semester">Faculty</label>
            {!! Form::select('faculty_id', $faculties, null, ['class' => 'form-control']) !!}
            @error('faculty_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id', $semesters, null, ['class' => 'form-control']) !!}
            @error('semester_id')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="subject"> Subject Name</label>
            {!! Form::select('subject_id',$subjects, null, ['class' => 'form-control']) !!}
            @error('subject_id')
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="">Assignments</label>
            {!! Form::text('assignments', null, ['class' => 'form-control']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">

        <div class="col-lg-6">
            <label for="">Submission_Date</label>
            {!! Form::date('submission_date', null, ['class' => 'form-control']) !!}
            @error('submission_date')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="note"> Assignment Upload</label>
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

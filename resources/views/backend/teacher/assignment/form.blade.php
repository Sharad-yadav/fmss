<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="batch">Batch_Year</label>
            {!! Form::select('batch_id', $batches, null, ['class' => 'form-control']) !!}
            @error('batch_id')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="semester">Faculty</label>
            {!! Form::select('faculty_id', [], null, ['class' => 'form-control', 'id' => 'faculty']) !!}
            @error('faculty_id')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">

        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id', [], null, ['class' => 'form-control', 'id' => 'semester']) !!}
            @error('semester_id')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="section">Section</label>
            {!! Form::select('section_id', [], null, ['class' => 'form-control', 'id' => 'section']) !!}
            @error('section_id')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="subject"> Subject Name</label>
            {!! Form::select('subject_id',[], null, ['class' => 'form-control', 'id' => 'subject']) !!}
            @error('subject_id')  <p style="color:red" >`
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="">Assignments</label>
            {!! Form::text('assignments', null, ['class' => 'form-control']) !!}
            @error('name')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">

        <div class="col-lg-6">
            <label for="">Submission_Date</label>
            {!! Form::date('submission_date', null, ['class' => 'form-control']) !!}
            @error('submission_date')  <p style="color:red" >
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="note"> Assignment Upload</label>
            {!! Form::file('file', ['class' => 'form-control']) !!}
            @error('file')  <p style="color:red" >
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

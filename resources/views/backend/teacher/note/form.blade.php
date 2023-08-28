<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="semester">Faculty</label>
            {!! Form::select('faculty_id', [] , null, ['class' => 'form-control', 'id' => 'faculty']) !!}
            @error('faculty_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id', [], null, ['class' => 'form-control kt-select2', 'id' => 'semester']) !!}
            @error('semester_id')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="subject"> Subject Name</label>
            {!! Form::select('subject_id',[], null, ['class' => 'form-control', 'id' => 'subject']) !!}
            @error('subject_id')
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="">Name</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label for="note"> Note Upload</label>
            {!! Form::file('note', ['class' => 'form-control']) !!}
            @error('note')
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

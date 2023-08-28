<div class="kt-portlet__body">
    <div class="form-group row">

        <div class="col-lg-6">
            <label for="batch">Batch</label>
            {!! Form::select('batch_id',$batches ,null, ['class' => 'form-control ']) !!}
            @error('batch_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="semester">Semester</label>
            {!! Form::select('semester_id',$semesters ,null, ['class' => 'form-control ']) !!}
            @error('semester_id')
            {{ $message }}
            @enderror
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="section">Section</label>
            {!! Form::select('section_id',$sections ,null, ['class' => 'form-control ']) !!}
            @error('section_id')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="name">Name</label>
            {!! Form::text('name' ,null, ['class' => 'form-control ']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="file"> Routine Upload</label>
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

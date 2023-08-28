<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="">Assignments</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>
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

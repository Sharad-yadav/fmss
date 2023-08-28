
<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="">Name</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @error('name')
            <p style="color:red" >
            {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="Notice"> Notice Upload</label>
            {!! Form::file('file', ['class' => 'form-control']) !!}
            @error('file')
            <p style="color:red" >

            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label for="for">For</label>
            {!! Form::select('for', $notices, null, ['class' => 'form-control']) !!}
            @error('for')
            <p style="color:red" >

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

<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="">Name</label>
            {!! Form::text('name',$faculty->name ?? null, ['class' => 'form-control']) !!}
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="years_to_graduate">Duration</label>
            {!! Form::text('years_to_graduate', $faculty->years_to_graduate?? null, ['class' => 'form-control']) !!}
            @error('years_to_graduate')
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



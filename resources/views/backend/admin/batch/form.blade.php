<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="batch_year">Batch</label>
            {!! Form::text('batch_year',$batches->batch_year ?? null, ['class' => 'form-control']) !!}
            @error('batch_year')
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



<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name">Name</label>
            {!! Form::text('user[name]', null, ['class' => 'form-control']) !!}
            @error('user.name')
                {{ $message }}
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="email">Email</label>
            {!! Form::email('user[email]', null, ['class' => 'form-control']) !!}
            @error('user.email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="faculty">Faculty</label>
            {!! Form::select('faculty_id', $faculties, null, ['class' => 'form-control']) !!}
            @error('faculty_id')
                {{ $message }}
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="phone">Phone</label>
            {!! Form::text('user[number]', null, ['class' => 'form-control']) !!}
            @error('user.number')
                {{ $message }}
            @enderror
        </div>

    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label for="salary">Salary</label>
            {!! Form::text('salary', null, ['class' => 'form-control']) !!}
            @error('salary')

            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="kt-checkbox-inline">
            <label class="kt-checkbox">
                <input type="checkbox" name="is_hod" value=1>HOD
                <span></span>
            </label>
            <label class="kt-checkbox">
                <input type="checkbox" name="is_lab" value=1>Lab Assistant
                <span></span>
            </label>
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

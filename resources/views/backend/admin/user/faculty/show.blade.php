
        @extends('backend.layouts.app')

        @section('content')
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon"></span>
                        <h3 class="kt-portlet__head-title">Faculty Details</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Name:</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ $faculty->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">YearsToGraduate:</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ $faculty->years_to_graduate }}</p>
                        </div>
                    </div>


                </div>
            </div>
@endsection

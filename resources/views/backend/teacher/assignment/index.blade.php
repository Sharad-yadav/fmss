@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Upload Assignment
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form kt-form--label-right">
            <div class="kt-portlet__body">

                <div class="form-group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> Assignment Upload</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="kt-dropzone dropzone m-dropzone--primary dz-clickable"
                            action="inc/api/dropzone/upload.php" id="m-dropzone-two">
                            <div class="kt-dropzone__msg dz-message needsclick">
                                <h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
                                <span class="kt-dropzone__msg-desc">Upload up to 10 files</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="reset" class="btn btn-brand">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js') }}/main-dropzone.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js') }}/dropzone.js" type="text/javascript"></script>
@endpush
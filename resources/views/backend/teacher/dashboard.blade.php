@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-4">

            <!--begin:: Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--project-1">
                        <div class="kt-widget__head d-flex">
                            <div class="kt-widget__label">
                                <div class="kt-widget__media kt-widget__media--m">
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden-">
                                        <img src="{{ asset('assets/admin/img/note.png') }}" alt="image">
                                    </span>
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden">
                                        <img src="./assets/media/users/100_12.jpg" alt="image">
                                    </span>
                                </div>
                                <div class="kt-widget__info kt-padding-0 kt-margin-l-15">
                                    <a href="#" class="kt-widget__title">
                                        Assignment
                                    </a>
                                    <span class="kt-widget__desc">
                                        Your Given Assignnment
                                    </span>
                                </div>
                            </div>
                            <div class="kt-widget__toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                <span class="kt-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                <span class="kt-nav__link-text">Charts</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                <span class="kt-nav__link-text">Members</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                <span class="kt-nav__link-text">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                Latest Assignments.
                            </span>
                            @forelse($assignments as $assignment)
                                <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($assignment->file) }}">
                                        {{ $assignment->assignments }}
                                    </a>
                                </span>
                            @empty
                                <span class="kt-widget__subtitel">No assignments
                                </span>
                            @endforelse
                        </div>
                        <div class="kt-widget__footer">
                            <div class="kt-widget__wrapper">
                                <div class="flex justify-center">
                                    @if ($assignments->count())
                                        <a href="{{ route('teacher.assignment.index') }}"
                                            class="btn btn-label btn-label-brand btn-lg btn-bold">
                                            View all
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>

            <!--end:: Portlet-->
        </div>

        <div class="col-xl-4">

            <!--begin:: Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--project-1">
                        <div class="kt-widget__head d-flex">
                            <div class="kt-widget__label">
                                <div class="kt-widget__media kt-widget__media--m">
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden-">
                                        <img src="{{ asset('assets/admin/img/book.png') }}" alt="image">
                                    </span>
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden">
                                        <img src="./assets/media/users/100_12.jpg" alt="image">
                                    </span>
                                </div>
                                <div class="kt-widget__info kt-padding-0 kt-margin-l-15">
                                    <a href="#" class="kt-widget__title">
                                        Note
                                    </a>
                                    <span class="kt-widget__desc">
                                        Your Notes
                                    </span>
                                </div>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                <span class="kt-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                <span class="kt-nav__link-text">Charts</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                <span class="kt-nav__link-text">Members</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                <span class="kt-nav__link-text">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                Latest Notes.
                            </span>
                            @forelse($notes as $note)
                                <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($note->file) }}">
                                        {{ $note->notes }}
                                    </a>
                                </span>
                            @empty
                                <span class="kt-widget__subtitel">No Notes
                                </span>
                            @endforelse
                        </div>
                        <div class="kt-widget__footer">
                            <div class="kt-widget__wrapper">
                                <div class="flex justify-center">
                                    @if ($notes->count())
                                        <a href="{{ route('teacher.note.index') }}"
                                            class="btn btn-label btn-label-brand btn-lg btn-bold">
                                            View all
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>

            <!--end:: Portlet-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--project-1">
                        <div class="kt-widget__head d-flex">
                            <div class="kt-widget__label">
                                <div class="kt-widget__media kt-widget__media--m">
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden-">
                                        <img src="{{ asset('assets/admin/img/notice1.png') }}" alt="image">
                                    </span>
                                    <span class="kt-userpic kt-userpic--md kt-userpic--circle kt-hidden">
                                        <img src="./assets/media/users/100_12.jpg" alt="image">
                                    </span>
                                </div>
                                <div class="kt-widget__info kt-padding-0 kt-margin-l-15">
                                    <a href="#" class="kt-widget__title">
                                        Notice
                                    </a>
                                    <span class="kt-widget__desc">
                                        List of Notice
                                    </span>
                                </div>
                            </div>
                            <div class="kt-widget__toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                    data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                <span class="kt-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                <span class="kt-nav__link-text">Charts</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                <span class="kt-nav__link-text">Members</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                <span class="kt-nav__link-text">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                All the students available in class
                            </span>
                            <div class="kt-widget__stats kt-margin-t-20">
                                <div class="kt-widget__item d-flex align-items-center kt-margin-r-30">
                                    <span class="kt-widget__date kt-padding-0 kt-margin-r-10">
                                        Start
                                    </span>
                                    <div class="kt-widget__label">
                                        <span class="btn btn-label-brand btn-sm btn-bold btn-upper">20 aug, 18</span>
                                    </div>
                                </div>
                                <div class="kt-widget__item d-flex align-items-center kt-padding-l-0">
                                    <span class="kt-widget__date kt-padding-0 kt-margin-r-10 ">
                                        Due
                                    </span>
                                    <div class="kt-widget__label">
                                        <span class="btn btn-label-danger btn-sm btn-bold btn-upper">07 dec, 18</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__container">
                                <span class="kt-widget__subtitel">Progress</span>
                                <div class="kt-widget__progress d-flex align-items-center flex-fill">
                                    <div class="progress" style="height: 15px;width: 100%;">
                                        <div class="progress-bar kt-bg-success" role="progressbar" style="width: 92%;"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="kt-widget__stat">
                                        92%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__footer">
                            <div class="kt-widget__wrapper">
                                <div class="kt-widget__section">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>

            <!--end:: Portlet-->
        </div>
    </div>
@endsection
@push('scripts')
    <script src={{ asset('assets/admin/js/datepicker.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/admin/js/datepicker1.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/admin/js/datepicker.min.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/teacher/js/switch1.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/teacher/js/switch.js') }} type="text/javascript"></script>
@endpush

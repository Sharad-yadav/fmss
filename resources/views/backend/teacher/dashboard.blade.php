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
                                        {{ $note->name }}
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
                                        <img src="{{ asset('assets/admin/img/notice.png') }}" alt="image">
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
                                        Your Notices
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
                                Latest Notices.
                            </span>
                            @forelse( $notices as $notice)
                                <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($notice->file) }}">
                                        {{ $notice->notices }}
                                    </a>
                                </span>
                            @empty
                                <span class="kt-widget__subtitel">No Notices
                                </span>
                            @endforelse
                        </div>
                        <div class="kt-widget__footer">
                            <div class="kt-widget__wrapper">
                                <div class="flex justify-center">
                                    @if ($notices->count())
                                        <a href="{{ route('teacher.notice.index') }}"
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
    </div>
@endsection


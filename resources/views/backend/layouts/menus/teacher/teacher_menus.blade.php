<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
        data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ route('teacher.note.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Note</span>
                </a>
            </li>
            <li class="kt-menu__item kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Assignment</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="kt-menu__submenu " kt-hidden-height="400" style="">
                    <span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('teacher.assignment.index') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="la la-list-ul">
                                    </i>
                                </span>
                                <span class="kt-menu__link-text">Assignment</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="{{ route('student.assignment_upload.index') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="la la-list-ul">
                                    </i>
                                </span>
                                <span class="kt-menu__link-text">Assignment_Received</span>
                            </a>
                        </li>
                    </ul>
                </div>
            <li class="kt-menu__item " aria-haspopup="true">

            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ route('admin.semester.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-list-ul">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Notice</span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ route('teacher.leave.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-align-justify">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Leave</span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ route('admin.batch.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Routine</span>
                </a>

            </li>

            <li class="kt-menu__item " aria-haspopup="true">
                <a href="{{ getProfileRoute() }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-gear">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Settings</span>
                </a>
            </li>
    </div>
</div>

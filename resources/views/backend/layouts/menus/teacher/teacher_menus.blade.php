<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
        data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::TeacherDashboard) }}" aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::TeacherNote) }} " aria-haspopup="true">
                <a href="{{ route('teacher.note.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Note</span>
                </a>
            </li>
            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::TeacherAssignment) }} " aria-haspopup="true">
                <a href="{{ route('teacher.assignment.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-list-ul">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Assignments</span>
                </a>
            </li>

            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::TeacherNotice) }}" aria-haspopup="true">
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
            <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::TeacherRoutine) }} " aria-haspopup="true">
                <a href="{{ route('teacher.routine.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Routine</span>
                </a>

            </li>
            <li class="kt-menu__item   " aria-haspopup="true">
                <a href="{{ route('teacher.syllabus.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Syllabus</span>
                </a>

            </li>

{{--            <li class="kt-menu__item " aria-haspopup="true">--}}
{{--                <a href="{{ getProfileRoute() }}" class="kt-menu__link ">--}}
{{--                    <span class="kt-menu__link-icon">--}}
{{--                        <i class="la la-gear">--}}
{{--                        </i>--}}
{{--                    </span>--}}
{{--                    <span class="kt-menu__link-text">Settings</span>--}}
{{--                </a>--}}
{{--            </li>--}}
    </div>
</div>

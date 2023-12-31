<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav {{ getActiveClass(\App\Constants\RouteConstant::StudentDashboard) }}">
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                <a href="{{ route('student.dashboard') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::StudentNote) }}" aria-haspopup="true">
                <a href="{{ route('student.note.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Note</span>
                </a>
            </li>
            <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::StudentAssignment) }} " aria-haspopup="true">
                <a href="{{ route('student.assignment.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Assignment</span>
                </a>
            </li>
            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::StudentNotice) }} " aria-haspopup="true">
                <a href="{{ route('student.notice.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-list-ul">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Notice</span>
                </a>
            </li>
            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::StudentLeave) }} " aria-haspopup="true">
                <a href="{{ route('student.leave.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-book">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">leave</span>
                </a>
            </li>

            <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::StudentRoutine) }} " aria-haspopup="true">
                <a href="{{ route('student.routine.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-list-ul">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Routine</span>
                </a>
            </li>
            <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::StudentSyllabus) }}" aria-haspopup="true">
                <a href="{{ route('student.syllabus.index') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-list-ul">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Syllabus</span>
                </a>
            </li>

        </ul>
    </div>
</div>

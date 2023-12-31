<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::TeacherDashboard) }}" aria-haspopup="true">
                <a href="{{ route('dash') }}" class="kt-menu__link ">
                    <span class="kt-menu__link-icon">
                        <i class="la la-dashboard">
                        </i>
                    </span>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>

                <li class="kt-menu__item  {{ getActiveClass(\App\Constants\RouteConstant::TeacherRoutine) }}" aria-haspopup="true">
                    <a href="{{ route('admin.batch.index') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <i class="la la-book">
                            </i>
                        </span>
                        <span class="kt-menu__link-text">Routine</span>
                    </a>
                </li>
                <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::TeacherNotice) }}" aria-haspopup="true">
                    <a href="{{ route('admin.batch.index') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <i class="la la-book">
                            </i>
                        </span>
                        <span class="kt-menu__link-text">Notice</span>
                    </a>
                </li>
                <li class="kt-menu__item {{ getActiveClass(\App\Constants\RouteConstant::TeacherLeave) }}" aria-haspopup="true">
                    <a href="{{ route('admin.batch.index') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <i class="la la-book">
                            </i>
                        </span>
                        <span class="kt-menu__link-text"> Leave </span>
                    </a>
                </li>


        </ul>

    </div>
</div>

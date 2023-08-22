<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

    <!-- begin:: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

        </div>
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item dropdown">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
            </div>
        </div>

        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ me(getCurrentGuard(), 'name') }}</span>
                    <img class="kt-hidden" alt="Pic" src="./assets/media/users/300_25.jpg" />
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span
                        class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ Str::substr(me(getCurrentGuard(), 'name'), 0, 1) }}</span>
                </div>
            </div>
            <div
                class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                    style="background-image: url(./assets/media/misc/bg-1.jpg)">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="./assets/media/users/300_25.jpg" />
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span
                            class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ Str::substr(me(getCurrentGuard(), 'name'), 0, 1) }}</span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ me(getCurrentGuard(), 'name') }}
                    </div>
                </div>
                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__item-details">
                        {{-- <div class="kt-notification__item-title kt-font-bold">
                                <a href="{{ route('admin.profile.index') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">My Profile</a>

                            </div> --}}
                        {{-- <div class="kt-notification__item-time">
                                Account settings and more
                            </div> --}}
                    </div>

                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{ getProfileRoute() }}"
                            class="btn btn-label btn-label-brand btn-sm btn-bold">My Profile</a>

                        <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>
                        <form id="logout-form"
                            action="{{ getCurrentGuard() == 'admin' ? route('admin.logout') : route('logout') }}"
                            method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->

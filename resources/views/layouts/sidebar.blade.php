<div class="app-sidebar">
    <div class="logo" style="padding: 15px 20px">
        <a href="{{ route('home') }}" class="logo-icon"><span class="logo-text">LWCC</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            {{-- <a href="#">
                <img src="../../assets/images/avatars/avatar1.jpg">
                <span class="activity-indicator"></span>
                <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
            </a> --}}
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>
            <li>
                <a href="file-manager.html"><i class="material-icons-two-tone">cloud_queue</i>Members</a>
            </li>
            <li>
                <a href="calendar.html"><i class="material-icons-two-tone">calendar_today</i>Branches<span class="badge rounded-pill badge-success float-end">14</span></a>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">star</i>Pages<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="settings.html">Settings</a>
                    </li>
                    <li>
                        <a href="#">Authentication<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="lock-screen.html">Lock Screen</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="error.html">Error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">grid_on</i>Tables<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="tables-basic.html">Basic</a>
                    </li>
                    <li>
                        <a href="tables-datatable.html">DataTable</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">
                Layout
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">view_day</i>Header<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="header-basic.html">Basic</a>
                    </li>
                    <li>
                        <a href="header-full-width.html">Full-width</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-title">
                Other
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">bookmark</i>Documentation</a>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">access_time</i>Change Log</a>
            </li>
            <li>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-danger btn-sm">
                        {{-- <i class="material-icons-two-tone">access_time</i> --}}
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>
</div>

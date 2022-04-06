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
            <li><a href="{{ route('home') }}"><i class="material-icons-two-tone">dashboard</i>Home</a>
            </li>
            <li>
                <a href="{{ route('members.index') }}"><i class="material-icons-two-tone">cloud_queue</i>Members</a>
            </li>
            <li>
                <a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>Branches</a>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">star</i>Ministries<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('ministries.index') }}">View All Ministries</a></li>
                    <li><a href="{{ route('ministries.create') }}">Create New</a></li>
                </ul>
            </li>

            <li class="sidebar-title">
                Finance
            </li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">money</i>Member Contributions</a></li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>Branch Contributions</a></li>

            <li class="sidebar-title">
                Finance
            </li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>Announcements</a></li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>Notifications</a></li>

            <li class="sidebar-title">
                System
            </li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>System Logs</a></li>
            <li><a href="{{ route('branches.index') }}"><i class="material-icons-two-tone">calendar_today</i>Edit My Profile</a></li>

            <li class="text-center mt-3">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-danger btn-sm font-weight-bold">
                        {{-- <i class="material-icons-two-tone">access_time</i> --}}
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Left Sidebar start-->
<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Settings</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ URL::route('admin_dashboard') }}">Reload</a> </li>
                </ul>
            </li>
            <!-- menu title -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Logo </li>
            <!-- menu item Elements-->
            <li>

                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ URL::route('uploads') }}">Logo</a></li>
                </ul>
            </li>
            <!-- menu item calendar-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">Logo</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ URL::route('uploads') }}">Logo </a> </li>
                </ul>
            </li>

        </ul>
    </div>
</div>

<!-- Left Sidebar End-->

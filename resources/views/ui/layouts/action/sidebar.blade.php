<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

       @php
           $isAdmin = (new \App\Http\Controllers\MainController())->checkAdmin();
       @endphp
       @if($isAdmin)
            <!-- Start Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
       @endif

        <li class="nav-heading">Pages</li>

        <!-- Start Profile Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.profile.show') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Nav -->

        <!-- Start Orders Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('order.me.list') }}">
                        <i class="bi bi-circle"></i><span>List Order</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Orders Nav -->
    </ul>

</aside>

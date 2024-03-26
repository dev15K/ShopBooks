<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Start Profile Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.profile.show') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Nav -->

        <!-- Start Products Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.products.list') }}">
                        <i class="bi bi-circle"></i><span>List Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.createProcess') }}">
                        <i class="bi bi-circle"></i><span>Create Product</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Products Nav -->


        <!-- Start User Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.users.list') }}">
                        <i class="bi bi-circle"></i><span>List User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.createProcess') }}">
                        <i class="bi bi-circle"></i><span>Create User</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End User Nav -->
    </ul>

</aside>

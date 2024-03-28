<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Start Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <!-- Start Category Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.categories.list') }}">
                        <i class="bi bi-circle"></i><span>List Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.createProcess') }}">
                        <i class="bi bi-circle"></i><span>Create Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Category Nav -->

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

        <!-- Start Orders Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Orders Nav -->

        <!-- Start Contacts Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Contact</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.contacts.list') }}">
                        <i class="bi bi-circle"></i><span>List Contact</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Contacts Nav -->

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

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.profile.show') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

    </ul>

</aside>

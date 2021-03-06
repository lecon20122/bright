<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Bright</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fas fa-sitemap"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('question.index') }}" class="nav-link">
                        <i class="fas fa-question-circle"></i>
                        <p>
                            Questions
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctor.index') }}" class="nav-link">
                        <i class="fas fa-user-md"></i>
                        <p>
                           Doctors
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shadowteacher.index') }}" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>
                            Shadow-Teacher
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('center.index') }}" class="nav-link">
                        <i class="fas fa-archway"></i>
                        <p>
                            Center
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-right text-danger"></i>
                        <p class="text-danger">
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">Woocomerce Api</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Features</li>
                <!-- <li class="nav-item">
                    <a href="{{ route('designation.index') }}" class="nav-link {{ Route::is('designation.index') || Route::is('designation.create') || Route::is('designation.edit') ? 'active' : '' }}">
                        <i class="fa fa-star"></i>
                        <p>Designations</p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="{{ route('tag.index') }}" class="nav-link {{ Route::is('tag.index') || Route::is('tag.create') || Route::is('tag.edit') ? 'active' : '' }}">
                        <i class="fa fa-star"></i>
                        <p>Tags</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="{{ route('client.index') }}" class="nav-link {{ Route::is('client.index') || Route::is('client.create') || Route::is('client.edit') || Route::is('client.show') ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        <p>Clients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('employee.index') }}" class="nav-link {{ Route::is('employee.index') || Route::is('employee.create') || Route::is('employee.edit') || Route::is('employee.show') ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        <p>Employees</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link {{ Route::is('project.index') || Route::is('project.create') || Route::is('project.edit') || Route::is('project.show') ? 'active' : '' }}">
                        <i class="fa fa-bars"></i>
                        <p>Projects</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('task.index') }}" class="nav-link {{ Route::is('task.index') || Route::is('task.create') || Route::is('task.edit') || Route::is('task.show') ? 'active' : '' }}">
                        <i class="fa fa-bars"></i>
                        <p>Task</p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="{{ route('woocomerce.index') }}" class="nav-link  {{ Route::is('woocomerce.index') || Route::is('woocomerce.create') || Route::is('woocomerce.edit') || Route::is('woocomerce.show') ? 'active' : '' }}">
                        <i class="fa fa-bars"></i>
                        <p>Woocomerce Api</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link  {{ Route::is('order.index') || Route::is('order.create') || Route::is('order.edit') || Route::is('order.show') ? 'active' : '' }}">
                        <i class="fa fa-bars"></i>
                        <p>Order</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('regionals.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>Regions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

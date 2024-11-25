<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-gauge"></i><span>Dashboard</span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Master</li>
            <li class="nav-item dropdown {{ $type_menu === 'category' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-shop"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                    </li>
                    {{-- <li class="{{ Request::is('customers') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Member</a>
                    </li> --}}
                    <li class="{{ Request::is('suppliers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('suppliers.index') }}">Supplier</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Transaksi</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('categories') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Kasir</a>
                    </li>
                    <li class="{{ Request::is('products') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Pembelian dari supplier</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Report</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Report</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Laporan</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">System</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>System</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('user') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('users') }}">Users</a>
                    </li>
                    <li class="{{ Request::is('categories') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Pengaturan</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li class="menu-header">Order</li>
            <li class="nav-item dropdown {{ $type_menu === 'order' ? 'active' : '' }}">
                <a href="{{ url('orders') }}" class="nav-link"><i class="fas fa-gauge"></i><span>Order</span></a>
            </li>
        </ul>
    </aside>
</div>

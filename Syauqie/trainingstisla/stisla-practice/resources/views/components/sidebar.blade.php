<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SyaQUI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="/"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'auth' ? 'active' : '' }}">
                <a href="{{ url('auth-login') }}"><i class="fas fa-user"></i><span>Login</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'posts' ? 'active' : '' }}">
                <a href="{{ url('posts') }}"><i class="fas fa-book"></i><span>Posts</span></a>
            </li>
        </ul>
    </aside>
</div>

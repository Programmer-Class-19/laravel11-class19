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
            <li class="nav-item dropdown <?php echo e($type_menu === 'dashboard' ? 'active' : ''); ?>">
                <a href="/"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown <?php echo e($type_menu === 'auth' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('auth-login')); ?>"><i class="fas fa-user"></i><span>Login</span></a>
            </li>
            <li class="nav-item dropdown <?php echo e($type_menu === 'posts' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('posts')); ?>"><i class="fas fa-star"></i><span>Users</span></a>
            </li>
            <li class="nav-item dropdown <?php echo e($type_menu === 'create-article' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('add-article')); ?>"><i class="fas fa-book"></i><span>Add Article</span></a>
            </li>
        </ul>
    </aside>
</div>
<?php /**PATH D:\laravel 19\laravel11-class19\Syauqie\trainingstisla\stisla-practice\resources\views/components/sidebar.blade.php ENDPATH**/ ?>
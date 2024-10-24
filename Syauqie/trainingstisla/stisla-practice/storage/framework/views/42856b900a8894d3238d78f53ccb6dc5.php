<?php $__env->startSection('title', 'General Dashboard'); ?>

<?php $__env->startPush('style'); ?>
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?php echo e(asset('library/jqvmap/dist/jqvmap.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('library/summernote/dist/summernote-bs4.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- JS Libraies -->
    <script src="<?php echo e(asset('library/simpleweather/jquery.simpleWeather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/jqvmap/dist/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('library/summernote/dist/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo e(asset('js/page/index-0.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel 19\laravel11-class19\Syauqie\trainingstisla\stisla-practice\resources\views/pages/dashboard-general-dashboard.blade.php ENDPATH**/ ?>
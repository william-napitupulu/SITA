<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="d-flex align-items-center">
  <h1 class="mr-2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
  <small class="text-muted">Overview of the application</small>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title">Welcome</h3>
      </div>
      <div class="card-body">
        <p>Welcome to this beautiful admin panel.</p>
        <p>Here, you can manage all aspects of the platform.</p>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
  /* Customize the appearance of the dashboard */
  .content-header {
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
  }

  .card-header {
    font-weight: bold;
  }

  .card-body p {
    margin: 0;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/home.blade.php ENDPATH**/ ?>
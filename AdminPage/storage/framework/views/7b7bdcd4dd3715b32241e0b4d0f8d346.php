<?php $sidebarItemHelper = app('JeroenNoten\LaravelAdminLte\Helpers\SidebarItemHelper'); ?>

<?php if($sidebarItemHelper->isHeader($item)): ?>

    
    <?php echo $__env->make('adminlte::partials.sidebar.menu-item-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($sidebarItemHelper->isLegacySearch($item) || $sidebarItemHelper->isCustomSearch($item)): ?>

    
    <?php echo $__env->make('adminlte::partials.sidebar.menu-item-search-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($sidebarItemHelper->isMenuSearch($item)): ?>

    
    <?php echo $__env->make('adminlte::partials.sidebar.menu-item-search-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($sidebarItemHelper->isSubmenu($item)): ?>

    
    <?php echo $__env->make('adminlte::partials.sidebar.menu-item-treeview-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($sidebarItemHelper->isLink($item)): ?>

    
    <?php echo $__env->make('adminlte::partials.sidebar.menu-item-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\AdminPage\vendor\jeroennoten\laravel-adminlte\src/../resources/views/partials/sidebar/menu-item.blade.php ENDPATH**/ ?>
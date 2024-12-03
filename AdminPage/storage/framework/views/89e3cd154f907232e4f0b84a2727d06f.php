<?php
    $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout');
    $profile_url = route('profile');
    $settings_url = route('profile.settings');

    if (config('adminlte.use_route_url', false)) {
        $logout_url = $logout_url ? route($logout_url) : '';
    } else {
        $logout_url = $logout_url ? url($logout_url) : '';
    }
?>

<li class="nav-item dropdown user-menu">
    
    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
        <img src="<?php echo e(Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png')); ?>"
             class="user-image img-circle elevation-2 mr-2"
             width="30" height="30"
             alt="<?php echo e(Auth::user()->name); ?>">
        <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
    </a>

    
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
        <li class="user-header bg-primary">
            <img src="<?php echo e(Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png')); ?>"
                 class="img-circle elevation-2"
                 alt="<?php echo e(Auth::user()->name); ?>">
            <p>
                <?php echo e(Auth::user()->name); ?>

                <small>Role: <?php echo e(Auth::user()->role); ?></small>
            </p>
        </li>

        
        <li class="user-footer">
            <a href="<?php echo e($profile_url); ?>" class="btn btn-default btn-flat">
                <i class="fa fa-fw fa-user text-lightblue"></i> Profil
            </a>
        </li>

        
        <li class="user-footer">
            <a href="<?php echo e($settings_url); ?>" class="btn btn-default btn-flat">
                <i class="fa fa-fw fa-cog text-lightblue"></i> Pengaturan
            </a>
        </li>

        
        <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat float-right"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i> Keluar
            </a>
            <form id="logout-form" action="<?php echo e($logout_url); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </li>
    </ul>
</li>
<?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\vendor\jeroennoten\laravel-adminlte\src/../resources/views/partials/navbar/menu-item-dropdown-user-menu.blade.php ENDPATH**/ ?>
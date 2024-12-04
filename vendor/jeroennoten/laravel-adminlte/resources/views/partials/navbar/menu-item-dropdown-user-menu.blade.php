@php
    $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout');
    $profile_url = route('profile');
    $settings_url = route('profile.settings');

    if (config('adminlte.use_route_url', false)) {
        $logout_url = $logout_url ? route($logout_url) : '';
    } else {
        $logout_url = $logout_url ? url($logout_url) : '';
    }
@endphp

<li class="nav-item dropdown user-menu">
    {{-- User menu toggler with photo and name --}}
    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
        <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
             class="user-image img-circle elevation-2 mr-2"
             width="30" height="30"
             alt="{{ Auth::user()->name }}">
        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- User menu header --}}
        <li class="user-header bg-primary">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                 class="img-circle elevation-2"
                 alt="{{ Auth::user()->name }}">
            <p>
                {{ Auth::user()->name }}
                <small>Role: {{ Auth::user()->role }}</small>
            </p>
        </li>

        {{-- Profile Link --}}
        <li class="user-footer">
            <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                <i class="fa fa-fw fa-user text-lightblue"></i> Profil
            </a>
        </li>

        {{-- Settings Link --}}
        <li class="user-footer">
            <a href="{{ $settings_url }}" class="btn btn-default btn-flat">
                <i class="fa fa-fw fa-cog text-lightblue"></i> Pengaturan
            </a>
        </li>

        {{-- Logout Link --}}
        <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat float-right"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i> Keluar
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</li>

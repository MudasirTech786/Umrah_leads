<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if (auth()->user()->can('users-list') || auth()->user()->can('users-create') || auth()->user()->can('roles-list'))
                <li class="nav-item"><a href=""><i class="la la-user"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Users</span></a>
                    <ul class="menu-content">

                        @can('users-create')
                            <li class="">
                                <a class="menu-item" href="{{ route('users.create') }}" data-i18n="nav.dash.ecommerce">Add
                                    User</a>
                            </li>
                        @endcan
                        @can('users-list')
                            <li class="">
                                <a class="menu-item" href="{{ route('users.index') }}" data-i18n="nav.dash.ecommerce">View
                                    Users</a>
                            </li>
                        @endcan
                        @can('roles-list')
                            <li class="">
                                <a class="menu-item" href="{{ route('roles.index') }}" data-i18n="nav.dash.ecommerce">roles
                                    Management</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            {{-- @if (auth()->user()->can('routes-create') || auth()->user()->can('routes-list')) --}}
                <li class="nav-item"><a href="{{ request()->routeIs('routes.index') ? 'active' : '' }}"><i
                            class="la la-car"></i><span class="menu-title" data-i18n="nav.dash.main">Leads</span></a>
                    <ul class="menu-content">
                        {{-- @can('routes-list') --}}
                            <li class="{{ request()->routeIs('routes.index') ? 'active' : '' }}">
                                <a class="menu-item" href="{{ route('leads.index') }}" data-i18n="nav.dash.ecommerce">View
                                    Leads</a>
                            </li>
                        {{-- @endcan --}}
                    </ul>
                </li>
            {{-- @endif --}}

        </ul>
    </div>
</div>

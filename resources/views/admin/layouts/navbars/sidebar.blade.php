<div class="sidebar" data-color="purple"
    data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{ url('admin') }}" class="simple-text logo-normal">
            {{ __('Steel Mart') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'categories' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/categories') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Categories') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'materials' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/materials') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Materials') }}</p>
                </a>
            </li>

            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/lots') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Lots') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'auctions' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.auctions.index') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Auction') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>

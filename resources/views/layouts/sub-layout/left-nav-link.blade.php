<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('archive-classroom-index') }}">
                <i class="mdi mdi-archive menu-icon"></i>
                <span class="menu-title">Archive</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.password') }}">
                <i class="mdi mdi-key-outline menu-icon"></i>
                <span class="menu-title">Update Password</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-power menu-icon"></i>
                <span class="menu-title">Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

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
      {{--  This should render when the page is on classroom  --}}
      {{--  <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-share-variant menu-icon"></i>
          <span class="menu-title">Share Classroom</span>
        </a>
      </li>  --}}
    </ul>
</nav>

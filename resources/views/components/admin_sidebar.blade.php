 <!-- ======= Sidebar ======= -->
 <div class="sidebar">
  <aside id="sidebar">
    <div class="sidebar-header">
        <button class="btn btn-sm btn-sidebar-toggle" id="sidebarToggle">
            <i class="bi bi-chevron-left" id="chevron"></i>
              <h5 style="display: inline-block; margin-left: 10px;">Si Pakar</h5>
        </button>
    </div>
    <ul class="sidebar-nav sidebar-menu" id="sidebar-nav">
  
      <li class="nav-item">
        <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('form') ? '' : 'collapsed' }}" href="{{ route('form.index') }}">
          <i class="bi bi-clipboard-check"></i>
          <span>Diagnosa</span>
        </a>
      </li><!-- End Diagnosa Page Nav -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('spk') ? '' : 'collapsed' }}" href="{{ route('spk.index') }}">
          <i class="bi bi-clipboard2-data"></i>
          <span>Hasil Diagnosa</span>
        </a>
      </li><!-- End penyakit Page Nav -->

      {{-- only admin can access --}}
      @if (auth()->user()->role_id === 1)
        <li class="nav-item">
          <a class="nav-link {{ request()->is('gejala') ? '' : 'collapsed' }}" href="{{ route('gejala.index') }}">
            <i class="bi bi-activity"></i>
            <span>Gejala</span>
          </a>
        </li><!-- End Gejala Page Nav -->
    
        {{-- <li class="nav-item">
          <a class="nav-link {{ request()->is('penyakit') ? '' : 'collapsed' }}" href="{{ route('penyakit.index') }}">
            <i class="bi bi-patch-question"></i>
            <span>Penyakit</span>
          </a>
        </li><!-- End penyakit Page Nav --> --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard/*') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/dashboard/add_admin">
                <i class="bi bi-circle"></i><span>Add Admin</span>
              </a>
            </li>
            <li>
              <a href="/dashboard/admin">
                <i class="bi bi-circle"></i><span>List Admin</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->
      @endif
    </ul>
  
  </aside>
</div>

{{-- <div class="sidebar collapsed">
  <aside id="sidebar">
    <div class="sidebar-header">
        <button class="btn btn-sm btn-sidebar-toggle" id="sidebarToggle">
            <i class="bi bi-patch-question"></i>
        </button>
    </div>
    <ul class="sidebar-nav sidebar-menu-collapsed" id="sidebar-nav">
  
      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
        </a>
      </li><!-- End Dashboard Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('form.index') }}">
          <i class="bi bi-clipboard-check"></i>
        </a>
      </li><!-- End Gejala Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('gejala.index') }}">
          <i class="bi bi-activity"></i>
        </a>
      </li><!-- End Gejala Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('penyakit.index') }}">
          <i class="bi bi-patch-question"></i>
        </a>
      </li><!-- End penyakit Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('spk.index') }}">
          <i class="bi bi-clipboard2-data"></i>
        </a>
      </li><!-- End penyakit Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse collapsed" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/add_admin">
              <i class="bi bi-circle"></i>
              <span>Add Admin</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/admin">
              <i class="bi bi-circle"></i>
              <span>List Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
    </ul>
  
  </aside>
</div> --}}

<!-- End Sidebar-->



<style>
 /* CSS */
.sidebar {
    width: 230px;
    height: 100%;
    background-color: #f8f9fa;
    position: fixed;
    left: 0;
    transition: width 0.3s ease;
}

.sidebar.collapsed {
    width: 80px;
}

.sidebar.collapsed h5{
    display: none !important;
}

.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.sidebar-menu-collapsed li {
  padding: 0;
}

.sidebar-menu-collapsed .nav-link span, .nav-heading {
  display: none;
}

.sidebar-menu-collapsed .nav-content a {
  padding-left: 0 !important;
}

.content {
    margin-left: 200px; /* Adjust this value to match the sidebar width */
    transition: margin-left 0.3s ease;
}
.content.collapsed {
    margin-left: 60px;
}




</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let isCollapse = false;
    var sidebarToggle = document.getElementById('sidebarToggle');
    var sidebar = document.querySelector('.sidebar');
    var content = document.querySelector('.content');
    var sidebarNav = document.getElementById('sidebar-nav');
    var sidebarIcon = document.getElementById('chevron');

    sidebarToggle.addEventListener('click', function() {
      isCollapse = !isCollapse;
      if (isCollapse) {
        sidebarNav.classList.remove('sidebar-menu');
        sidebarNav.classList.toggle('sidebar-menu-collapsed');
        sidebarIcon.classList.remove('bi-chevron-left')
        sidebarIcon.classList.toggle('bi-chevron-right');
      }
      else {
        sidebarNav.classList.remove('sidebar-menu-collapsed');
        sidebarNav.classList.toggle('sidebar-menu');
        sidebarIcon.classList.remove('bi-chevron-right');
        sidebarIcon.classList.toggle('bi-chevron-left');
      }
        
        
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    });
});

</script>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="../admin">
             
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/provinsi')}}">
              
              <span class="nav-link-text">Provinsi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/kota')}}">
              
              <span class="nav-link-text">Kota</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/kecamatan')}}">
              
              <span class="nav-link-text">Kecamatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/desa')}}">
              
              <span class="nav-link-text">Desa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/rw')}}">
              
              <span class="nav-link-text">Rw</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/kasus')}}">
             
              <span class="nav-link-text">Kasus</span>
            </a>
          </li>
        
     
      </div>
    </div>
  </div>
</nav>
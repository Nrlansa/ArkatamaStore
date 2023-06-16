  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
          <img src="{{ url('public') }}/img/Logoarkatama.png" class="brand-image img-circle elevation-3"
              style="opacity: .7">
          <span class="brand-text font-weight-light">Arkatama Store</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ url('public') }}/img/userO.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <h5 class="d-block" style="color: white">{{ auth()->user()->nama }}</h5>
                  <p class="d-block" style="color: white">{{ auth()->user()->role }}</p>

              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              {{-- <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div> --}}
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ url('/staffdashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/staffproduk') }}" class="nav-link">
                          <i class="nav-icon fas fa-shopping-cart"></i>
                          <p>
                              Produk
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

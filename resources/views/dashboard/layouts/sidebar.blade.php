      <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Kirin ★ Peformance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <div class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-body-secondary text-uppercase">
                  MENU
              </div>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard">
                  <i class="fa-solid fa-gauge-high"></i>
                  Dashboard
                </a>
              </li>
              @if (auth()->user()->is_admin != '1')
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard/profile">
                  <i class="fa-solid fa-user"></i>
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard/absensi">
                <i class="fa-solid fa-check-to-slot"></i>
                  Absensi
                </a>
              </li>
            @endif
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard/reports">
                  <i class="fa-solid fa-file-lines"></i>
                  Reports
                </a>
              </li>
            </ul>

            @can('admin')
            <ul class="nav flex-column">
                <div class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-body-secondary text-uppercase">
                    Administrator
                </div>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard/employees">
                    <i class="fa-solid fa-database"></i>
                    Employees
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 text-dark" href="/dashboard/divisions">
                      <i class="fa-solid fa-users"></i>
                      Division
                    </a>
                </li>
              </ul>
            @endcan

          </div>
        </div>
      </div>


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
                  Profil
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
                  Laporan
                </a>
              </li>
            </ul>

            @can('admin')
            <ul class="nav flex-column">
                <div class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-body-secondary text-uppercase">
                    Administrator
                </div>
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#Employees" aria-expanded="false" aria-controls="Employees">
                    <i class="fa-solid fa-user"></i>
                    <span class="ms-2">Karyawan</span>
                </button>
                <div class="collapse" id="Employees" style="margin-top: -1rem;">
                    <div class="card card-body border-0" style="background-color: transparent;">
                        <ul class="btn-toggle-nav list-unstyled fw-normal small">
                            <li><a href="/dashboard/employees/create" class="link-body-emphasis d-inline-flex text-decoration-none rounded ms-4">Tambah Karyawan</a></li>
                            <li><a href="/dashboard/employees" class="link-body-emphasis d-inline-flex text-decoration-none rounded pt-2 ms-4">Data Karyawan</a></li>
                        </ul>
                    </div>
                  </div>

                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#Division" aria-expanded="false" aria-controls="Division">
                    <i class="fa-solid fa-database"></i>
                    <span class="ms-2">Divisi</span>
                </button>
                <div class="collapse" id="Division" style="margin-top: -1rem;">
                    <div class="card card-body border-0" style="background-color: transparent;">
                        <ul class="btn-toggle-nav list-unstyled fw-normal small">
                            <li><a href="/dashboard/divisions/create" class="link-body-emphasis d-inline-flex text-decoration-none rounded ms-4">Tambah Divisi</a></li>
                            <li><a href="/dashboard/divisions" class="link-body-emphasis d-inline-flex text-decoration-none rounded pt-2 ms-4">Data Divisi</a></li>
                        </ul>
                    </div>
                  </div>
              </ul>
            @endcan

          </div>
        </div>
      </div>


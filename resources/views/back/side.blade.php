<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">CUTI</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
            <li class="menu-item">
              <a href="{{ url('/home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="{{ url('/home') }}">Dashboards</div>
                <div class="badge bg-danger rounded-pill ms-auto"></div>
              </a>
            </li>


             <!-- Components -->
             <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
            <!-- Cards -->
            @canany(['create-user', 'edit-user', 'delete-user'])
            <li class="menu-item">
              <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Users">Users</div>
              </a>
            </li>
            @endcanany
            <!-- User interface -->
            @canany(['create-role', 'edit-role', 'delete-role'])
            <li class="menu-item">
              <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Role">Role</div>
              </a>
            </li>
            @endcanany
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Cuti</span></li>
            <!-- Cards -->
            @canany(['create-jenis-cuti', 'edit-jenis-cuti', 'delete-jenis-cuti'])
            <li class="menu-item">
              <a href="{{ route('jenis-cuti.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Jenis cuti">Jenis cuti</div>
              </a>
            </li>
            @endcanany
            <!-- User interface -->
            @canany(['create-pengajuan', 'edit-pengajuan', 'delete-pengajuan'])
            <li class="menu-item">
              <a href="{{ route('pengajuan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Pengajuan cuti">Pengajuan cuti</div>
              </a>
            </li>
            @endcanany
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Report</span></li>
            <!-- Cards -->

            @canany(['filter'])
            <li class="menu-item">
              <a href="{{ route('filter.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Pengajuan">Report Pengajuan</div>
              </a>
            </li>
            @endcanany
</ul>




                        @endguest
        </aside>

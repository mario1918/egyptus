<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile not-navigation-link">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="{{ url('admin/images/faces/face8.jpg') }}" alt="profile image">
            </div>
            <div class="text-wrapper">
              <p class="profile-name">{{Auth::user()->firstName}}</p>
              <div class="dropdown" data-display="static">
                <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <small class="designation text-muted">Manager</small>
                  <span class="status-indicator online"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                  <a class="dropdown-item p-0">
                    <div class="d-flex border-bottom">
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                        <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item mt-2"> Manage Accounts </a>
                  <a class="dropdown-item"> Change Password </a>
                  <a class="dropdown-item"> Check Inbox </a>
                  <a class="dropdown-item"> Sign Out </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('tourguides.index')}}" target="_blank">
          <i class="menu-icon mdi mdi-account-search"></i>
          <span class="menu-title">Tour Guides</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('tourists.index')}}" target="_blank">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">Tourists</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" target="_blank">
          <i class="menu-icon mdi mdi-anchor"></i>
          <span class="menu-title">Activities</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank">
          <i class="menu-icon mdi mdi-airplane"></i>
          <span class="menu-title">Trips</span>
        </a>
    </li>
    </ul>
  </nav>
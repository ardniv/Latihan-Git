
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="white" >
            <a href="index" class="logo">
              <img
                src="assets/img/stiki_logo.png"
                alt="navbar brand"
                
                height="50"
              />
              <span>JAWA</span>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>

        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a href="{{route('count')}}">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-table"></i>
                  <p>Table</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index">
                        <span class="sub-item">Table Mahasiswa</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('user')}}">
                        <span class="sub-item">Table User</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>    
            </ul>
          </div>
        </div>
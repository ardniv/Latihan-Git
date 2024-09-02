              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <!-- <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">  -->
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      @if($profil->img)
                        <img src="{{ asset('storage/' . $profil->img) }}" class="avatar-img rounded-circle">
                        @else
                            <span style="fw-bold">
                            {{ substr($profil->nama, 0, 1) }}
                            </span>
                    @endif
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">{{ Auth::user()->nama }}</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                          @if($profil->img)
                            <img src="{{ asset('storage/' . $profil->img) }}" class="avatar-img rounded" alt="image profile"s>
                            @else
                                <span style="fw-bold">
                                {{ substr($profil->nama, 0, 1) }}
                                </span>
                          @endif
                          </div>
                          <div class="u-text">
                            <h4>{{ Auth::user()->nama }}</h4>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" href="#">My Profile</a> -->
                        <!-- <a class="dropdown-item" href="#">My Balance</a>
                        <a class="dropdown-item" href="#">Inbox</a> -->
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="{{route('meAdmin')}}">Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
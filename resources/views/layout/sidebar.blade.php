<div class="side-inner">

        <!-- <a href="profile" class="logo-wrap">
          <div class="logo">
            <span>{{ substr(Auth::user()->nama, 0, 1) }}</span>
          </div>
          <span class="logo-text" style="color: black;">{{ Auth::user()->nama }}</span>
        </a> -->

        <a href="{{route('me')}}" class="logo-wrap">
        <div class="logo" style="background-color: #f0f0f0;">
          
            @if($user->img)
              <img src="{{ asset('storage/' . $user->img) }}" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                  <span style="font-size: 32px; color: #000;">
                    {{ substr($user->nama, 0, 1) }}
                  </span>
            @endif

          </div>
          <span class="logo-text" style="color: black;">{{ Auth::user()->nama }}</span>
        </a>
          
        <!-- <div class="search-form">
          <form action="#">
            <span class="wrap-icon">
              <span class="icon-search2"></span>
            </span>
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div> -->
        
        <div class="nav-menu">
          <ul>
            <li class="active"><a href="index" class="d-flex align-items-center"><span class="wrap-icon fas fa-home mr-3"></span><span class="menu-text">Home</span></a></li>
            <li class="active"><a class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="wrap-icon fas fa-sign-out-alt mr-3"></span><span class="menu-text">Logout</span></a></li>
            <!-- <li><a href="#" class="d-flex align-items-center"><span class="wrap-icon icon-book mr-3"></span><span class="menu-text">Books</span></a></li>
            <li><a href="#" class="d-flex align-items-center"><span class="wrap-icon icon-shopping-cart mr-3"></span><span class="menu-text">Store</span></a></li>
            <li><a href="#" class="d-flex align-items-center"><span class="wrap-icon icon-pie-chart mr-3"></span><span class="menu-text">Analytics</span></a></li>
            <li><a href="#" class="d-flex align-items-center"><span class="wrap-icon icon-cog mr-3"></span><span class="menu-text">Settings</span></a></li> -->
          </ul>
        </div>
      </div>
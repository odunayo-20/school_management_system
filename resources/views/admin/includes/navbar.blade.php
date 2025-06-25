<div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
          <div class="navbar-bg"></div>

    <nav class="sticky navbar navbar-expand-lg main-navbar">
            <div class="mr-auto form-inline">
              <ul class="mr-3 navbar-nav">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
                <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                  </a></li>
                <li>
                  <form class="mr-auto form-inline">
                    <div class="search-element">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                      <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </form>
                </li>
              </ul>
            </div>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                  class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                  <span class="badge headerBadge1">
                    6 </span> </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                      <a href="#">Mark All As Read</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-avatar"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                      </span> <span class="dropdown-item-desc"> <span class="message-user">John
                          Deo</span>
                        <span class="time messege-text">Please check your mail !!</span>
                        <span class="time">2 Min Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-avatar">
                        {{-- <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle"> --}}
                      </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                          Smith</span> <span class="time messege-text">Request for leave
                          application</span>
                        <span class="time">5 Min Ago</span>
                      </span>
                    </a>

                  </div>

                  <div class="text-center dropdown-footer">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                  class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                  <div class="dropdown-header">
                    Notifications
                    <div class="float-right">
                      <a href="#">Mark All As Read</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread"> <span
                        class="text-white dropdown-item-icon bg-primary"> <i class="fas fa-code"></i>
                      </span> <span class="dropdown-item-desc"> Template update is
                        available now! <span class="time">2 Min
                          Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-icon bg-info"> <i class="far fa-user"></i>
                      </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                          Sugiharto</b> are now friends <span class="time">10 Hours
                          Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-icon bg-success"> <i
                          class="fas fa-check"></i>
                      </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                          Hours
                          Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-icon bg-danger"> <i
                          class="fas fa-exclamation-triangle"></i>
                      </span> <span class="dropdown-item-desc"> Low disk space. Let's
                        clean it! <span class="time">17 Hours Ago</span>
                      </span>
                    </a> <a href="#" class="dropdown-item"> <span class="text-white dropdown-item-icon bg-info"> <i class="fas fa-bell"></i>
                      </span> <span class="dropdown-item-desc"> Welcome to Otika
                        template! <span class="time">Yesterday</span>
                      </span>
                    </a>
                  </div>
                  <div class="text-center dropdown-footer">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown"><a href="" data-toggle="dropdown"
                  class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                   <img alt="image" src="{{Storage::url(Auth::guard('admin')->user()->image)}}" class="user-img-radious-style">
                    <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                  <div class="dropdown-title">
                    @auth('admin')
                    @if(Auth::guard('admin'))
                    {{ Auth::guard('admin')->user()->name }}
                  @endif

                    @endauth
                </div>
                  <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
                  </a>
                  <a href="{{ route('admin_change_password') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Change Password
                  </a>
                  <div class="dropdown-divider"></div>
                  {{-- @livewire('admin.auth.AdminLogout') --}}
                  <a href="{{ route('admin_logout') }}"  class="dropdown-item has-icon text-danger" style="cursor: pointer">
                    <i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
              </li>
            </ul>
          </nav>
    </div>

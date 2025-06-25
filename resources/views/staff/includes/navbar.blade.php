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


              <li class="dropdown"><a href="#" data-toggle="dropdown"
                  class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  @auth('staff')

                  <img alt="image" src="{{ Storage::url(Auth::guard('staff')->user()->image ) }}" class="user-img-radious-style">
                  @endauth
                    <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                  <div class="dropdown-title">
                    @auth('staff')
                    @if(Auth::guard('staff'))
                    {{ Auth::guard('staff')->user()->firstname }}
                    {{ Auth::guard('staff')->user()->lastname }}
                  @endif

                    @endauth
                </div>
                  <a href="{{ route('staff_profile') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <div>
                    {{-- <a wire:click.prevent='logout'  class="dropdown-item has-icon text-danger" style="cursor: pointer">
                         <i class="fas fa-sign-out-alt"></i>Logout</a> --}}
                         <a href="{{ route('staff_logout') }}"  class="dropdown-item has-icon text-danger" style="cursor: pointer">
                            <i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
                </div>
              </li>
            </ul>
          </nav>
    </div>

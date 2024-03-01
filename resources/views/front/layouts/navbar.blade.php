 <!--/ Nav Star /-->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ route('homepage') }}">Emlak<span class="color-b">Sitesi</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          
        <li class="nav-item">
            <a class="nav-link @if(Request::segment(1) == 'anasayfa') active @endif" href="{{ route('homepage') }}">Anasayfa</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link @if(Request::segment(1) == 'hakkimizda') active @endif" href="{{ route('about') }}">Hakkımızda</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link @if(Request::segment(1) == 'iletisim') active @endif" href="{{ route('contact') }}">iletişim</a>
          </li>
          
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Satılık
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Konut</a>
              <a class="dropdown-item" href="blog-single.html">Dükkan</a>
              <a class="dropdown-item" href="agents-grid.html">Arsa</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Kiralık
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Konut</a>
              <a class="dropdown-item" href="blog-single.html">Dükkan</a>
              <a class="dropdown-item" href="agents-grid.html">Arsa</a>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link @if(Request::segment(1) == 'hakkimizda') active @endif" href="{{ route('about') }}">Vizyonumuz</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if(Request::segment(1) == 'hakkimizda') active @endif" href="{{ route('about') }}">Misyonumuz</a>
          </li>

          @if(!Auth::guard('myuser')->check())
            <li class="nav-item">
            <button type="button" class="btn btn-success"><a href="{{ route('my_login')}}">Giriş Yap</a></button>
            </li>
            <li class="nav-item">
            <button type="button" class="btn btn-success"><a href="{{ route('my_register')}}">Kaydol</a></button>
            </li>
          @else
            <li class="nav-item dropdown ">
                <div class="contanier">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('myuser')->user()->name  }} {{ Auth::guard('myuser')->user()->surname  }}</span>
                      <img class="img-profile rounded-circle" width="10%" height="10%"
                          src="{{ asset('back')}}/img/undraw_profile.svg">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Profile
                      </a>
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Settings
                      </a>
                      <a class="dropdown-item" href="{{ route('ilanVer')}}">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          İlan ver
                      </a>
                      <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('my_logout') }}"
                            onclick=";">
                              {{ __('Çıkış Yap') }}
                          </a>
                      </div>
                </div>
              </li>
            @endif
        </ul>

        <!-- @if(Auth::guard('myuser')->check() && Request::segment(1) == 'ilanlar')
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
          data-target="#navbarTogglerDemo01" aria-expanded="false">
          <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        </div>
       @endif -->

  </nav>
  <!--/ Nav End /-->
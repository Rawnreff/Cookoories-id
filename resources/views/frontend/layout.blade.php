<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Cookoories</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/core-img/favicon.ico') }}" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
  </head>

  <body>
    <!-- Preloader -->
    <div id="preloader">
      <i class="circle-preloader"></i>
      <img src="{{ asset('frontend/img/core-img/salad.png') }}" alt="" />
    </div>

    <!-- Search Wrapper -->
    <div class="search-wrapper">
      <!-- Close Btn -->
      <div class="close-btn">
        <i class="fa fa-times" aria-hidden="true"></i>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="{{ url('recipe') }}" method="get">
              <input
                type="search"
                name="search"
                placeholder="Type any keywords..."
              />
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
      <!-- Top Header Area -->
      <div class="top-header-area">
        <div class="container h-100">
          <div class="row h-100 align-items-center justify-content-between">
            <!-- Breaking News -->
            <div class="col-12 col-sm-6">
              <div class="breaking-news">
                <div id="breakingNewsTicker" class="ticker">
                  <ul>
                    <li><a href="#">Welcome to Cookoories</a></li>
                    <li><a href="#">Hello Cookooriesser!</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Top Social Info -->
            <div class="col-12 col-sm-6">
              <div class="top-social-info text-right">
                <a href="#"
                  ><i class="fa fa-pinterest" aria-hidden="true"></i
                ></a>
                <a href="#"
                  ><i class="fa fa-facebook" aria-hidden="true"></i
                ></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"
                  ><i class="fa fa-dribbble" aria-hidden="true"></i
                ></a>
                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                <a href="#"
                  ><i class="fa fa-linkedin" aria-hidden="true"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navbar Area -->
      <div class="delicious-main-menu">
        <div class="classy-nav-container breakpoint-off">
          <div class="container">
            <!-- Menu -->
            <nav
              class="classy-navbar justify-content-between"
              id="deliciousNav"
            >
              <!-- Logo -->
              <a class="nav-brand" href="index.html"
                ><img style="width: 300px;" src="{{ asset('frontend/img/core-img/logo-cookoories.png') }}" alt=""
              /></a>

              <!-- Navbar Toggler -->
              <div class="classy-navbar-toggler">
                <span class="navbarToggler"
                  ><span></span><span></span><span></span
                ></span>
              </div>

              <!-- Menu -->
              <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                  <div class="cross-wrap">
                    <span class="top"></span><span class="bottom"></span>
                  </div>
                </div>

                <!-- Nav Start -->
                <div class="classynav">
                  <ul>
                    <li class="{{ request()->is('/') || request()->is('admin/permissions/*') ? 'active' : '' }}"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="{{ request()->is('recipe') || request()->is('recipe/*') ? 'active' : '' }}"><a href="{{ route('recipe') }}">Recipes</a></li>
                    <li class="{{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>
                    <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>

                  <!-- Newsletter Form -->
                  <div class="search-btn">
                    <i name="search" class="fa fa-search" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- Nav End -->
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
      <div class="container h-100">
        <div class="row h-100">
          <div
            class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between"
          >
            <!-- Footer Social Info -->
            <div class="footer-social-info text-right">
              <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
            <!-- Footer Logo -->
            <div class="footer-logo">
              <a href="#top"
                ><img style="width: 100px;" src="{{ asset('frontend/img/core-img/logo-cookoories.png') }}" alt=""
              /></a>
            </div>
            <!-- Copywrite -->
            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());

                // Scroll Up Button
                window.addEventListener('scroll', function() {
                  const scrollUp = document.getElementById('scrollUp');
                  if (window.pageYOffset > 300) {
                    scrollUp.classList.add('show');
                    scrollUp.classList.add('pulse');
                  } else {
                    scrollUp.classList.remove('show');
                    scrollUp.classList.remove('pulse');
                  }
                });

                document.getElementById('scrollUp').addEventListener('click', function(e) {
                  e.preventDefault();
                  window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                  });
                });
              </script>
              All rights reserved
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('frontend/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('frontend/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('frontend/js/active.js') }}"></script>
  </body>
</html>

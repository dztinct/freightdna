<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <title>{{ $title ?? 'FreightDNA' }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
    
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="stylesheet" href="fonts/icomoon/style.css">
    
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="css/aos.css">
    
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="css/style.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    

        <div class="site-wrap" id="home-section">
    
          <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
              <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
              </div>
            </div>
            <div class="site-mobile-menu-body"></div>
          </div>

          <div class="top-bar">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">you@freightdna.com</span></a>
                  <span class="mx-md-2 d-inline-block"></span>
                  <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+234 (810) 0510 230</span></a>
    
    
                  <div class="float-right">
    
                    <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                    <span class="mx-md-2 d-inline-block"></span>
                    <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>
    
                  </div>
    
                </div>
    
              </div>
    
            </div>
          </div>

          <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

            <div class="container">
              <div class="row align-items-center position-relative">
    
    
                <div class="site-logo flex items-center space-x-3 h-0">
                  <a href="{{ route('home') }}">
                      <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <a href="{{ route('home') }}" class="text-black"><span class="text-[#1649A2] text-2xl"><span class="capitalize">Freight</span>DNA </span></a>
                </div>
    
                <div class="col-12">
                  <nav class="site-navigation text-right ml-auto " role="navigation">
    
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                      <li>
                          <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </li>
                      <li>
                        <x-nav-link :href="route('services')" :active="request()->routeIs('services')">
                            {{ __('Services') }}
                        </x-nav-link>
                        </li>
    
    
                      <li>
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('About') }}
                        </x-nav-link>
                      </li>

                      <li>
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                      </li>

                      <li>
                        <x-nav-link :href="route('shipment.form')" :active="request()->routeIs('shipment.form')">
                            {{ __('Ship') }}
                        </x-nav-link>
                      </li>

                      @if(auth()->check())
                      <li>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                      </li>
                      @endif

                      <li>
                        <div class="btn bg-[#1649A2] m-2">
                            <a href="{{ route('shipment.track') }}">
                                Track
                            </a>
                        </div>
                      </li>

                      @if(auth()->check())
                      <li class="my-2 btn text-start">
                        <livewire:layout.logout/>
                      </li>
                      @endif

                    </ul>
                  </nav>    
                </div>
    
                <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
    
              </div>
            </div>
    
          </header>
        {{-- <div class="min-h-screen bg-gray-100"> --}}

            {{-- <livewire:layout.navigation /> --}}

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

                  <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-7">
                  <h2 class="footer-heading mb-4">About Us</h2>
                  <p>Freight DNA delivers integrated logistics and procuremnt solutions designed to simplify global operations. We specialize in fast air freight, reliable sea shipping, and strategic sourcing to ensure your supply chain is always efficient and cost-effective.</p>
                </div>
                <div class="col-md-4 ml-auto">
                  <h2 class="footer-heading mb-4">Features</h2>
                  <ul class="list-unstyled">
                      <li><a href="{{ route('home') }}">Home</a></li>
                      <li><a href="{{ route('about') }}">About Us</a></li>
                      <li><a href="{{ route('services') }}">Service</a></li>
                      <li><a href="{{ route('contact') }}">Contact Us</a></li>
                      <li><a href="{{ route('shipment.form') }}">Ship</a></li>
                    <li><a href="{{ route('shipment.track') }}">Track</a></li>
                  </ul>
                </div>
  
              </div>
            </div>
            <div class="col-md-4 ml-auto">
  
              <!-- <div class="mb-5">
                <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
                <form action="#" method="post" class="footer-suscribe-form">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                    </div>
                  </div>
              </div> -->
  
  
              <h2 class="footer-heading mb-4">Follow Us</h2>
              <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </form>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy; {{ date('Y') }} All rights reserved. 
                  </p>
              </div>
            </div>
  
          </div>
        </div>
      </footer>
        </div>

          
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/aos.js"></script>
  
      <script src="js/main.js"></script>

    </body>
</html>

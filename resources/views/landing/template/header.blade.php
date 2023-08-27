 <!-- Header Section Start -->
 <div class="header-section section">

     <!-- Header Top Start -->
     <div class="header-top">
         <div class="container">
             <div class="row">
                 <div class="col">

                     <!-- Header Top Wrapper Start -->
                     <div class="header-top-wrapper">
                         <div class="row">

                             <!-- Header Social -->
                             <div class="header-social col-md-4 col-12">

                             </div>

                             <!-- Header Logo -->
                             <div class="header-logo col-md-4 col-12">
                                 <a href="index.html" class="logo"><img src="{{ url('public') }}/img/Logoarkatama.png"
                                         alt="logo" width="80px" height="80px"></a>
                             </div>

                             <!-- Account Menu -->
                             <div class="account-menu col-md-4 col-12">
                                 <ul>
                                     @if (Auth::check())
                                         <li class="{{ request()->is('/profil') ? 'active' : '' }}"><a
                                                 href="{{ url('/profil', ['id' => Auth::id()]) }}">Akun saya</a></li>
                                         <li> Masuk Sebagai : {{ Auth::user()->nama }}</li>
                                         <li><a href="{{ url('/logout') }}">Keluar</a></li>
                                     @else
                                         <li><a href="{{ url('/login') }}">Masuk</a></li>
                                     @endif


                                     </li>
                                 </ul>
                             </div>

                         </div>
                     </div><!-- Header Top Wrapper End -->

                 </div>
             </div>
         </div>
     </div><!-- Header Top End -->

     <!-- Header Bottom Start -->
     <div class="header-bottom section">
         <div class="container">
             <div class="row">

                 <!-- Header Bottom Wrapper Start -->
                 <div class="header-bottom-wrapper text-center col">

                     <!-- Header Bottom Logo -->
                     <div class="header-bottom-logo">
                         <a href="index.html" class="logo"><img src="{{ url('public') }}/img/Logoarkatama.png"
                                 alt="logo" width="20px" height="20px"></a>
                     </div>

                     <!-- Main Menu -->
                     <nav id="main-menu" class="main-menu">
                         <ul>
                             <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a>
                             </li>
                             <li class="{{ request()->is('listproduk') ? 'active' : '' }}"><a
                                     href="{{ url('/listproduk') }}">Produk</a></li>
                             @if (Auth::check())
                                 {{-- <li class="{{ request()->is('pembayaran') ? 'active' : '' }}"><a
                                         href="{{ url('/pembayaran') }}">Pembayaran</a></li> --}}
                                 <li class="{{ request()->is('keranjang') ? 'active' : '' }}"><a
                                         href="{{ url('/keranjang') }}">Keranjang</a></li>
                                 <li><a href="#">Pesanan Saya</a>
                                     <ul class="sub-menu">
                                         <li><a href="{{ url('/belumbayar') }}">Belum Bayar</a></li>
                                         <li><a href="{{ url('/pemeriksaan') }}">Verifikasi Pembayaran</a></li>
                                         <li><a href="{{ url('/dikemas') }}">Dikemas</a></li>
                                         <li><a href="{{ url('/dikirim') }}">Dikirim</a></li>
                                         <li><a href="{{ url('/selesai') }}">Selesai</a></li>
                                         <li><a href="{{ url('/dibatalkan') }}">Dibatalkan</a></li>
                                     </ul>
                                 </li>
                             @else
                                 <li><a href="{{ url('/login') }}">Masuk</a></li>
                             @endif
                         </ul>
                     </nav>
                     <!-- Header Search -->
                     {{-- <div class="header-search">
                            
                            <!-- Search Toggle -->
                            <button class="search-toggle"><i class="ion-ios-search-strong"></i></button>
                            
                            <!-- Search Form -->
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            
                        </div> --}}

                     <!-- Mobile Menu -->
                     <div class="mobile-menu section d-md-none"></div>

                 </div><!-- Header Bottom Wrapper End -->

             </div>
         </div>
     </div><!-- Header Bottom End -->

 </div><!-- Header Section End -->

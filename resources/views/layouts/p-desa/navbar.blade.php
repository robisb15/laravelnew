<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-warning"
     id="layout-navbar">

     <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         <!-- Search -->
         <div class="navbar-nav align-items-center m-2">
             <div class="nav-item d-flex align-items-center">
                 <a class="btn "href="{{ url('p-desa/') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div data-i18n="Analytics">Dashboard</div>
                 </a>
             </div>
         </div>
         
         <div class="navbar-nav align-items-center ">
             <div class="nav-item d-flex align-items-center">
                 <a class="btn " href="{{ url('/p-desa/pendaftaran') }}" class="menu-link">
                     <i class="menu-icon tf-icons bx bx-home-circle"></i>
                     <div data-i18n="Analytics " >Riwayat</div>
                 </a>
             </div>
         </div>
         <!-- /Search -->

         <ul class="navbar-nav flex-row align-items-center ms-auto">
             <!-- Place this tag where you want the button to render. -->

            <li><a href="{{ route('inbox.index') }}" class="badge text-bg-warning me-5"><i class=" bx bx-envelope bx-md"></i></a></li>
             <!-- User -->
             <li class="nav-item navbar-dropdown dropdown-user dropdown">
                 <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <div class="avatar avatar-online">
                         <img src="{{ asset('SqvNR7QrAdmin') }}/img/user.png" alt class="w-px-40 h-auto rounded-circle" />
                     </div>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-end">
                     <li>
                         <a class="dropdown-item" href="#">
                             <div class="d-flex">
                                 <div class="flex-shrink-0 me-3">
                                     <div class="avatar avatar-online">
                                         <img src="{{ asset('SqvNR7QrAdmin') }}/img/user.png" alt
                                             class="w-px-40 h-auto rounded-circle" />
                                     </div>
                                 </div>
                                 <div class="flex-grow-1">

                                     <small class="text-muted">Pegawai Desa</small>
                                 </div>
                             </div>
                         </a>
                     </li>
                     <li>
                         <div class="dropdown-divider"></div>
                     </li>
                     <li>
                         <a href="{{ url('/p-desa/profil/' . \Auth::user()->id) }}" class="dropdown-item">Profil Saya</a>
                     </li>

                     <li>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf

                             <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                 class="dropdown-item">
                                 {{ __('Log Out') }}
                             </x-dropdown-link>
                         </form>
                     </li>
                 </ul>
             </li>
             <!--/ User -->
         </ul>
     </div>
 </nav>
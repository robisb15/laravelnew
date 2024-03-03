<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="{{ url('/') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">Admin</h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    <a href="{{ route('inbox.index') }}" class="badge text-bg-primary"><i class="fa-solid fa-envelope fa-2x"></i></a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('SqvNR7QrAdmin') }}/img/user.png" alt=""
                                style="width: 40px; height: 40px;">
                           
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                            <a href="{{ url('/admin/profil/'.\Auth::user()->id)}}" class="dropdown-item">Profil Saya</a>
                           
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        </div>
                    </div>
                </div>
            </nav>
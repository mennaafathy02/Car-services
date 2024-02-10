        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="/{{ app()->getLocale() }}/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    {{ trans('words.dashboard') }}
                                </p>
                            </a>
                        </li>





                        {{-- users route --}}
                        <li class="nav-item">
                            <a href="{{ route("users.index") }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    {{ __("words.users") }}
                                </p>
                            </a>
                        </li>

                        {{-- booking route --}}
                        <li class="nav-item">
                            <a href="{{ route("bookings.index") }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    {{ __("words.bookings") }}
                                </p>
                            </a>
                        </li>

                        {{-- service route --}}
                        <li class="nav-item">
                            <a href="{{ route("services.index") }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    {{ __("words.services") }}
                                </p>
                            </a>
                        </li>


                        @if(admin())
                        <li class="nav-item">
                            <a href="{{ route("contact-us.index") }}" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    {{ __("words.contact us") }}
                                </p>
                            </a>
                        </li>
                        @endif



                        {{-- profile route --}}
                        <li class="nav-item">
                            <a href="{{ route("get.profile") }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    {{ trans('words.profile') }}
                                </p>
                            </a>
                        </li>


                        {{-- logout route --}}
                        <li class="nav-item">
                            <a href="{{ route("logout") }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    {{ trans('words.logout') }}
                                </p>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

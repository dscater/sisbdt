    <!--begin::Header-->
    <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}"
        data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
        <!--begin::Header container-->
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
            id="kt_app_header_container">
            <!--begin::Header mobile toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                <div class="btn btn-icon btn-color-white btn-active-color-primary w-35px h-35px"
                    id="kt_app_header_menu_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <!--end::Header mobile toggle-->
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                <a href="{{ route('inicio') }}">
                    <img alt="Logo" src="{{ $configuracion->url_logo }}" class="h-25px d-none d-lg-inline" />
                    <img alt="Logo" src="{{ $configuracion->url_logo }}" class="h-25px d-inline d-lg-none" />
                </a>
            </div>
            <!--end::Logo-->
            <!--begin::Header wrapper-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                <!--begin::Menu wrapper-->
                <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                        id="kt_app_header_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"
                            class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <Link :href="route('inicio')" class="menu-title">Inicio</Link>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        @if (in_array('configuracions.index', Auth::user()->permisos))
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"
                                class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <Link :href="route('configuracions.index')" class="menu-title">Configuración</Link>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        @if (in_array('parametrizacion.index', Auth::user()->permisos))
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0"
                                class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <Link :href="route('parametrizacions.index')" class="menu-title">Parametrización
                                    </Link>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
                <!--begin::Navbar-->
                <div class="app-navbar flex-shrink-0">
                    <!--begin::User menu-->
                    <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-35px"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <img class="symbol symbol-35px" src="{{ Auth::user()->url_foto }}" alt="user" />
                        </div>
                        <!--begin::User account menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ $configuracion->url_logo }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">
                                            Max Smith
                                            <span
                                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                        </div>
                                        <a href="#"
                                            class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="account/overview.html" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="apps/projects/list.html" class="menu-link px-5">
                                    <span class="menu-text">My Projects</span>
                                    <span class="menu-badge">
                                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign
                                    Out</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User menu-->
                    <!--begin::Action-->
                    <div class="app-navbar-item">
                        <button class="btn btn-sm btn-secondary d-flex flex-center ms-6 ps-3 pe-4 h-35px"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"> </i>
                            <span>Salir</span>
                        </button>
                        <form id="logout-form" action="{{ route('login.destroy') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <!--end::Action-->
                    <!--begin::Sidebar menu toggle-->
                    <!--end::Sidebar menu toggle-->
                </div>
                <!--end::Navbar-->
            </div>
            <!--end::Header wrapper-->
        </div>
        <!--end::Header container-->
    </div>
    <!--end::Header-->

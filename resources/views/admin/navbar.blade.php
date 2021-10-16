{{--<!-- Navbar -->--}}
{{--<nav class="navbar navbar-expand-lg navbar-transparent navbar-dark bg-primary  navbar-absolute">--}}
{{--    <div class="container-fluid" style="background-color:#eeeeee">--}}
{{--        <div class="navbar-wrapper">--}}
{{--            <div class="navbar-toggle">--}}
{{--                <button type="button" class="navbar-toggler">--}}
{{--                    <span class="navbar-toggler-bar bar1"></span>--}}
{{--                    <span class="navbar-toggler-bar bar2"></span>--}}
{{--                    <span class="navbar-toggler-bar bar3"></span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <a class="navbar-brand text-black-50" href="#pablo">Dashboard</a>--}}
{{--        </div>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-bar navbar-kebab"></span>--}}
{{--            <span class="navbar-toggler-bar navbar-kebab"></span>--}}
{{--            <span class="navbar-toggler-bar navbar-kebab"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse justify-content-end" id="navigation">--}}
{{--            <form>--}}
{{--                <div class="input-group no-border">--}}
{{--                    <input type="text" value="" class="form-control" placeholder="Search...">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <div class="input-group-text">--}}
{{--                            <i class="now-ui-icons ui-1_zoom-bold"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <ul class="navbar-nav">--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="now-ui-icons location_world"></i>--}}
{{--                        <p>--}}
{{--                            <span class="d-lg-none d-md-block">Some Actions</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#pablo">--}}
{{--                        <i class="now-ui-icons users_single-02"></i>--}}
{{--                        <p>--}}
{{--                            <span class="d-lg-none d-md-block">Account</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<div class="sidebar-header flex-column-auto pt-5 pt-lg-19 pb-5 px-5 px-lg-10">
    <!--begin::Toolbar-->
    <div class="d-flex">
        <!--begin::Desktop Search-->
        <div class="quick-search quick-search-inline flex-grow-1" id="kt_quick_search_inline">
            <!--begin::Form-->
            <form method="get" class="quick-search-form">
                <div class="input-group rounded bg-light">
                    <div class="input-group-prepend">
											<span class="input-group-text">
												<span class="svg-icon svg-icon-lg">
													<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
											</span>
                    </div>
                    <input type="text" class="form-control h-40px" placeholder="Search...">
                    <div class="input-group-append">
											<span class="input-group-text">
												<i class="quick-search-close ki ki-close icon-sm text-muted"></i>
											</span>
                    </div>
                </div>
            </form>
            <!--end::Form-->
            <!--begin::Search Toggle-->
            <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
            <!--end::Search Toggle-->
            <!--begin::Dropdown-->
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-anim-up">
                <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="350" data-mobile-height="200" style="height: 350px; overflow: hidden;"><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
            <!--end::Dropdown-->
        </div>
        <!--end::Desktop Search-->
    </div>
    <!--end::Dropdown-->
</div>

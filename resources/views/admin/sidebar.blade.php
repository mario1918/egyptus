
<div class="container sidebar">
<div class="aside aside-left d-flex flex-column">
    <!--begin::Brand-->
    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto pt-5 pt-lg-18 pb-10">
        <!--begin::Logo-->
        <div class="btn p-0 symbol symbol-60 symbol-light-primary" href="?page=index" id="kt_quick_user_toggle">
            <div class="symbol-label">
                <img alt="Logo" src="{{asset("img/001-boy.svg")}}" class="h-75 align-self-end">
            </div>
            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                <h4 href="#" class="text-dark text-hover-primary font-size-lg">{{auth()->user()->name}}</h4>
            </div>
        </div>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Nav Wrapper-->
    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pb-10 scroll ps" style="height: 347px; overflow: hidden;">
        <!--begin::Nav-->
        <ul class="nav flex-column">
            <!--begin::Item--><li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Latest Projects">
                <a href="{{route("home")}}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg active">
                    <span class="svg-icon svg-icon-xxl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </li>

            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Loans">
                <a href="{{route('tourguides.index')}}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg active">
                    Loans
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            @Admin
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Users">
                <a href="{{route('users.index')}}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg">
                    <i class="icon-xl far fa-user"></i>

                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Products">
                <a href="{{route('tourists.index')}}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg">
                    Products
                </a>
            </li>
            @user
            @endAdmin

            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="" data-original-title="Logout">
                <a class="dropdown-item" href="{{ route('logout') }}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icon-xl fas fa-door-open"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!--end::Footer-->
</div>
</div>
<style>
.sidebar{
    left: 0;
}
</style>

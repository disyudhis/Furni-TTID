<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">User Profile
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image: url('{{ asset('src/media/users/default.jpg') }}')">
                </div>
            </div>
            <div class="d-flex flex-column">
                <a href="#"
                    class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                <div class="text-muted mt-1">
                    @if (Auth::user()->role == 'ADMIN')
                        Admin
                    @else
                        User
                    @endif
                </div>
                <div class="navi mt-2">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign
                        Out</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!--end::Header-->
    </div>
    <!--end::Content-->
</div>

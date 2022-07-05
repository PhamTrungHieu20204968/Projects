<header class="py-3 border shadow">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Nhà Hàng</h1> 
            </div>
            <div class="col-8 d-flex justify-content-end align-items-center">
                <ul class="nav">
                    {{-- <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li> --}}
                    @if (session('login') !='true' || empty(session('login')))
                    <li class="nav-item">
                      <a href="{{route('checkLogin')}}" class="btn btn-info btn-sm ">Login</a>
                    </li>
                  @endif
                    @if (session('login')=='true')
                    <li class="nav-item">
                      <a onclick="return confirm('Đăng xuất?')" href="{{route('logout')}}" class="btn btn-warning btn-sm ">Logout</a>
                    </li>
                  @endif

                  </ul>
            </div>
        </div>
    </div>
</header>
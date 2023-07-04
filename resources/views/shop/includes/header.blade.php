<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My
                        Account</button>
                    <div class="dropdown-menu dropdown-menu-right justify-content-center">
                        <button class="dropdown-item" type="button">Sign in</button>
                        <button class="dropdown-item" type="button">Sign up</button>
                    </div>
                </div>
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                        data-toggle="dropdown">USD</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">EUR</button>
                        <button class="dropdown-item" type="button">GBP</button>
                        <button class="dropdown-item" type="button">CAD</button>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                        data-toggle="dropdown">EN</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">FR</button>
                        <button class="dropdown-item" type="button">AR</button>
                        <button class="dropdown-item" type="button">RU</button>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="{{ route('shop.index') }}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">PHIREUS</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SEAFOOD</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="{{ route('shop.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <button class="input-group-text bg-transparent text-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4 text-right">
            @if (isset(Auth()->guard('customers')->user()->name))
                <div class="user-info">
                    <div class="col-9 ml-5">
                        <h4 class="m-0"><span>Welcome, {{ Auth()->guard('customers')->user()->name }}</span></h4>
                    </div>
                    <div class="col-3">
                    <form method="POST" action="{{ route('shop.logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Log Out</button>
                    </form>
                    </div>
                </div>
            @else
                <a href="{{ route('shop.login') }}" title="Log in" class="login-btn bg-primary">
                    <h6>Log In</h6>
                </a>
            @endif
        </div>


    </div>
</div>


<style>
    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h4 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .user-info span {
        color: #007bff;
        margin-left: 5px;
    }

    .logout-btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
    }
</style>

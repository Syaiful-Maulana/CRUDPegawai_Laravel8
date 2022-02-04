<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-6 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <form action="#">
                    <input type="text" name="search" placeholder="Search..." required>
                    <i class="ti-search"></i>
                </form>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth()->user()->name}}<i class="fa fa-angle-down"></i></h4>
                <form method="POST" action="{{ route('logout')}}">
                    @csrf
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout')}}">Log Out</a>
                    </div>
                    </form>
                
            </div>
        </div>

    </div>
</div>
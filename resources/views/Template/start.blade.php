<div class="header-area">
    <div class="row align-items-center">
      <!-- nav and search button -->
      <div class="col-md-6 col-sm-8 clearfix">
        <div class="nav-btn pull-left">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <!-- profile info & task notification -->
      <div class="col-md-6 col-sm-4 clearfix">
        <div class="user-profile pull-right">
          <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar" />
          <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name}}<i class="fa fa-angle-down"></i></h4>
          <div class="dropdown-menu">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item" href="{{ route('logout')}}"  onclick="event.preventDefault();
              this.closest('form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
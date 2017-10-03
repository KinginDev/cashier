<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="/">AnimalGramm</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

        @if( ! (Auth::user() and Auth::user()->subscribed('main')))
        <li><a href="/subscribe">Subscribe</a></li>
        @endif
      </ul>
      @if(Auth::check() == false)
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      @else
       <ul class="nav navbar-nav navbar-right">
        <li>
           <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                              Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

        </li>
        <li><a href="/account">My Account</a></li>
    </ul>
      @endif
    </div>
  </div>
</nav>


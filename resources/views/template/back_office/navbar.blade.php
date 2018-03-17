<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="/">Machine à café</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(Request::is("ventes"))
                <li class="nav-item active"></li>
            @else
                <li class="nav-item">
                    @endif
                    <a class="nav-link" href="/ventes">Ventes</a>
                </li>
                @if (\Auth::user()->role === 'admin')
                    @if(Request::is("drinks"))
                        <li class="nav-item active"></li>
                    @else
                        <li class="nav-item">
                            @endif
                            <a class="nav-link" href="/drinks">Boissons</a>
                        </li>
                        @if(Request::is("recipes"))
                            <li class="nav-item active"></li>
                        @else
                            <li class="nav-item">
                                @endif
                                <a class="nav-link" href="/recipes">Recettes</a>
                            </li>
                            @if(Request::is("coins"))
                                <li class="nav-item active"></li>
                            @else
                                <li class="nav-item">
                                    @endif
                                    <a class="nav-link" href="/coins">Monnayeur</a>
                                </li>
                                @if(Request::is("ingredients"))
                                    <li class="nav-item active"></li>
                                @else
                                    <li class="nav-item">
                                        @endif
                                        <a class="nav-link" href="/ingredients">Stocks ingrédients</a>
                                    </li>
                 @endif
        </ul>
    </div>
    <div class="collapse navbar-collapse nav justify-content-end" id="app-navbar-collapse">

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li><a class='nav-link' href="{{ route('login') }}">Login</a></li>
                <li><a class='nav-link' href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                       aria-expanded="false" aria-haspopup="true"><i class="fa fa-user"></i>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</nav>
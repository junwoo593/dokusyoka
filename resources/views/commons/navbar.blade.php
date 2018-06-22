<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/LOGO2.png") }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('books.create') }}">
                                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                Add items
                              </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                Ranking
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('ranking.want') }}">♥ Ranking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Users
                              </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('users.show', Auth::id()) }}">My Page</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout.get') }}">Log out</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('signup.get') }}">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                New Registration
                              </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">
                                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                Let's Login
                              </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
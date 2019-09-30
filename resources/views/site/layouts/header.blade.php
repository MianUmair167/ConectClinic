<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <a href="/" title="Conect Clinic">
                        <img style="width: 220px" src="/site/img/conect-logo.png">
                    </a>
                </div>
            </div>
            <nav class="col-lg-9 col-6 menu">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/explore">Explorar</a>
                        </li>
                        <li>
                            <a href="/how-it-works">Como funciona</a>
                        </li>
                        <li>
                            <a href="/blog">Blog</a>
                        </li>
                    </ul>
                </div>
                <ul id="top_access">
                    @auth
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                       Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('spaces.all') }}">
                                        Meus espaços
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('spaces.create') }}">
                                        Cadastrar um espaço
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    @guest
                        <li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
                        <li><a href="{{ route('register') }}"><i class="pe-7s-add-user"></i></a></li>
                    @endguest
                </ul>

            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->
<header>
    <nav class="navbar navbar-light">
        <a href="{{route('home')}}" id="home">OPD</a>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div id="navbarNav">
            <ul class="navbar-nav">
                | &nbsp;
                <li class="nav-item active">
                    <i class="fa fa-folder-open"></i>
                    <a class="linknav" href="{{route('home')}}">&nbsp; Home &nbsp;</a>
                </li>
                @if(isset($server) && \Route::currentRouteName() == 'server' || \Route::currentRouteName() == 'website' || \Route::currentRouteName() == 'subdomain')
                    <li class="nav-item">
                        >
                        <a class="linknav" href="{{route('server', [$server->nodeName()])}}">{{$server->nodeName()}}
                            &nbsp;</a>
                    </li>
                @endif
                @if(isset($website) && \Route::currentRouteName() == 'website' || \Route::currentRouteName() == 'subdomain')
                    <li class="nav-item">
                        >
                        <a class="linknav"
                           href="{{route('server', [$server->nodeName(), $website->name()])}}">{{$website->name()}}</a>
                    </li>
                @endif
                @if(Route::currentRouteName() == 'avg')
                    <li class="nav-item">
                        > &nbsp;
                        <a class="linknav" href="{{route('avg')}}">Bewustwording AVG</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    @if(Route::currentRouteName() != 'avg')
        <nav id="avg">
            |&nbsp;
            <a class="linknav" target="_blank" data-toggle="tooltip" title="Klik hier op als je iets wilt leren!" href="{{route('avg')}}">Bewustwording AVG</a>
        </nav>
    @endif
</header>
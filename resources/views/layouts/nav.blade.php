<header>
    <nav class="navbar navbar-light">
        <a href="{{route('home')}}" id="home">OPD</a>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light">
        <i class="fa fa-folder-open"></i>
        <div id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="link" href="{{route('home')}}">&nbsp; Home &nbsp;</a>
                </li>
                @if(isset($server) && \Route::currentRouteName() == 'server' || \Route::currentRouteName() == 'website' || \Route::currentRouteName() == 'subdomain')
                    <li class="nav-item">
                        >
                        <a class="link" href="{{route('server', [$server->nodeName()])}}">{{$server->nodeName()}} &nbsp;</a>
                    </li>
                @endif
                @if(isset($website) && \Route::currentRouteName() == 'website' || \Route::currentRouteName() == 'subdomain')
                    <li class="nav-item">
                        >
                        <a class="link"
                           href="{{route('server', [$server->nodeName(), $website->name()])}}">{{$website->name()}}</a>
                    </li>
                @endif
                @if(Route::currentRouteName() == 'avg')
                    <li class="nav-item">
                        > &nbsp;
                        <a class="link" href="{{route('avg')}}">Bewustwording AVG</a>
                    </li>
                @endif
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>
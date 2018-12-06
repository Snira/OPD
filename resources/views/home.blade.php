@extends('layouts.app')
@php
    /** @var $website \App\Website
    ** @var $server \App\Server
    */
@endphp
<body>
<div class="container">
    <div class="row">
        @foreach($servers as $server)
            <div class="col-6">
                <div class="block">
                    <a href="{{route('server',$server->nodeName())}}" data-toggle="tooltip" class="h1 link"
                       title="Klik om de pagina in te zien voor info over server en bijbehorende websites">{{$server->nodeName()}}</a>
                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                         title="De Server voldoet aan de AVG!">
                    <p>{{$server->OSVersion()}}</p>
                    <hr>
                    <h3 class="h3" data-toggle="tooltip" title="Open de server-pagina voor alle websites">Websites</h3>
                    <ul>
                        @foreach($server->websiteCollection() as $website)
                            @if($website instanceof \App\Website)
                                <li>
                                    <a class="h4 link"
                                       href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                    <p>{{$website->frameworkVersion()}} {{$website->framework}}</p>
                                </li>
                            @endif
                            @if($loop->index == 5)
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="block">
                    <h3 class="h3" data-toggle="tooltip" title="Open de server-pagina voor alle domeinen">Subdomeinen</h3>
                    <ul>
                        @foreach($server->websiteCollection() as $website)
                            @if($website instanceof \App\Directory)
                                <li>
                                    <a class="h4 link"
                                       href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                </li>
                            @endif
                            @if($loop->index == 5)
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

        @endforeach
    </div>

</div>
</body>
</html>

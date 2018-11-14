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
                    <a href="{{route('server',$server->nodeName())}}" class="h1 link">{{$server->nodeName()}}</a>
                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                         title="Deze Server voldoet 100% aan de AVG!">
                    <p>{{$server->OSVersion()}}</p>
                    <hr>
                    <h3 class="h3">Websites</h3>
                    <ul>
                        @foreach($server->websiteCollection() as $website)
                            @if(!$website->isSubDomain())
                                <li>
                                    <a class="h4 link"
                                       href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                    <p>{{$website->frameworkVersion()}}</p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <hr>
                    <h3 class="h3">Subdomeinen</h3>
                    <ul>
                        @foreach($server->websiteCollection() as $website)
                            @if($website->isSubDomain())
                                <li>
                                    <a class="h4 link"
                                       href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                    <p>{{$website->frameworkVersion()}}</p>
                                </li>
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

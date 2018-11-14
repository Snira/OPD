@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <div class="row">
            <div class="server-header">
                <h1 class="h1">{{$server->nodeName()}}</h1>
                <p>{{$server->OSVersion()}}</p>
                <p>{{$server->kernelVersion()}}</p>

            </div>
        </div>
    </div>

    <div class="server">
        <div class="row">
            <div class="col-6">
                <h2>CPU Info</h2>
                @foreach($server->CPUInfo() as $info)
                    <p>{{$info}}</p>
                @endforeach
            </div>

            <div class="col-6">
                <h2 class="h2">Websites</h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if(!$website->isSubDomain())
                        <li>
                            <a class="h3 link"
                               href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                            <p>{{$website->frameworkVersion()}}</p>
                        </li>
                        @endif
                    @endforeach
                </ul>

                <h2 class="h2">Subdomeinen</h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if($website->isSubDomain())
                        <li>
                            <a class="h3 link"
                               href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                            <p>{{$website->frameworkVersion()}}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>


</body>
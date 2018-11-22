@extends('layouts.app')
<body>
<div class="container">
    <div class="block">
        <div class="row">
            <div class="block-header">
                <h1 class="h1">{{$server->nodeName()}}</h1>
                <p>{{$server->OSVersion()}}</p>
                <p>{{$server->kernelVersion()}}<i class="fa fa-exclamation-circle" data-toggle="tooltip" title="Het updaten van een kernel is belangrijk voor de beveiliging van de server"></i></p>

            </div>
        </div>
    </div>

    <div class="block">
        <div class="row">
            <div class="col-6">
                <h2 class="h2">CPU Info</h2>
                <ul>
                    @foreach($server->CPUInfo() as $info)
                        <p>{{$latestVersions->CentOS()}}</p>
                        <li>{{$info}}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6">
                <h2 class="h2">Websites</h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if($website instanceof \App\Website)
                        <li>
                            <a class="h4 link"
                               href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                            <p>{{$website->frameworkVersion()}} {{$website->framework}}</p>
                        </li>
                        @endif
                    @endforeach
                </ul>

                <h2 class="h2">Subdomeinen</h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if($website instanceof \App\Directory)
                        <li>
                            <a class="h4 link"
                               href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>

                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>


</body>
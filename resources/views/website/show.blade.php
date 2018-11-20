@extends('layouts.app')
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="head">
                <a href="https://{{$website->name()}}" target="_blank" class="h1 link" data-toggle="tooltip"
                   title="Klik om de website te openen">{{$website->name()}}</a>
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Deze Website voldoet aan de regelgeving">
            </div>

        </div>

        <div class="col-6">
            <div class="block">

                @if($website instanceof \App\Website)
                    <h2 class="h2">Algemene Info</h2>
                <p>{{$website->frameworkVersion()}}</p>
                <p>*nieuwste versie is {{$latestVersions->laravel()}}</p>
                @else
                    <p>Dit is een subdomein.</p>
                @endif
                <hr>
            </div>
        </div>

        @if($website instanceof \App\Website)
            {{--Kolom voor plugins--}}
            <div class="col-6">
                <div class="block">
                    <h2 class="h2">Plugins</h2>
                    <ul id="plugins" class="">
                        @foreach($website->plugins() as $plugin)
                            <li><p>{{$plugin}}</p></li>
                        @endforeach

                    </ul>
                </div>
                {{$website->plugins()->setPath($website->name())->render()}}
            </div>
        @else
            {{--Kolom voor subdomeinen--}}
            <div class="col-6">
                <div class="block">
                    <h2 class="h2">Domeinen</h2>
                    <ul id="plugins" class="">
                        @foreach($website->subDomains() as $domain)
                            <li><a class="link blue" href="{{route('subdomain', [$server->nodeName(), $website->directory, $domain->directory])}}">{{$domain->directory}}</a></li>
                        @endforeach

                    </ul>
                </div>
                {{$website->subDomains()->setPath($website->name())->render()}}
            </div>
        @endif
    </div>

</div>


</body>
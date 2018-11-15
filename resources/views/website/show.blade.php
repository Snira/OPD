@extends('layouts.app')
<body>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="block">
                <a href="https://{{$website->directory}}" target="_blank" class="h1 link" data-toggle="tooltip"
                   title="Klik om de website te openen">{{$website->directory}}</a>
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Deze Website voldoet aan de regelgeving">
                @if(!$website->isSubDomain())
                <p>{{$website->frameworkVersion()}}</p>
                <p>*nieuwste versie is {{$latestVersions->drupal()}}</p>
                @else
                    <p>Dit is een subdomein.</p>
                @endif
                <hr>
            </div>
        </div>

        {{--Kolom voor plugins--}}
        @if(!$website->isSubDomain())
            <div class="col-6">
                <div class="block">
                    <h2 class="h2">Plugins</h2>
                    <ul id="plugins" class="">
                        @foreach($website->plugins() as $plugin)
                            <li><p>{{$plugin}}</p></li>
                        @endforeach

                    </ul>
                </div>
                {{$website->plugins()->setPath($website->directory)->render()}}
            </div>
        @else
            {{--Kolom voor subdomeinen--}}
            <div class="col-6">
                <div class="block">
                    <h2 class="h2">Domeinen</h2>
                    <ul id="plugins" class="">
                        @foreach($website->subDomains() as $domain)
                            <li><p>{{$domain->directory}}</p></li>
                        @endforeach

                    </ul>
                </div>
                {{$website->subDomains()->setPath($website->directory)->render()}}
            </div>
        @endif
    </div>

</div>


</body>
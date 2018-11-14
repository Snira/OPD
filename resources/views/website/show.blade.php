@extends('layouts.app')
<body>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="server">
                <a href="https://{{$website->directory}}" target="_blank" class="h1 link" data-toggle="tooltip" title="Klik om de website te openen">{{$website->directory}}</a>
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Deze Website voldoet aan de regelgeving">
                <p>{{$website->frameworkVersion()}}</p>
                <p>*nieuwste versie is {{$latestVersions->latestLaravel()}}</p>
                <hr>
            </div>
        </div>
        <div class="col-6">
            <div class="server">
                <h2 class="h2">Plugins en helpers van {{$website->directory}}</h2>
                <div id="plugins" class="">
                    @foreach($website->plugins() as $plugin)
                        <p>{{$plugin}}</p>
                    @endforeach

                    {{$website->plugins()->setPath($website->directory)->render()}}
                </div>
            </div>

        </div>

    </div>

</div>


</body>
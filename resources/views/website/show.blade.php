@extends('layouts.app')
<body>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="block">
                <a href="https://{{$website->directory}}" target="_blank" class="h1 link" data-toggle="tooltip" title="Klik om de website te openen">{{$website->directory}}</a>
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Deze Website voldoet aan de regelgeving">
                <p>{{$website->frameworkVersion()}}</p>
                <p>*nieuwste versie is {{$latestVersions->drupal()}}</p>
                <hr>
            </div>
        </div>
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

    </div>

</div>


</body>
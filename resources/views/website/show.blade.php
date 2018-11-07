@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <h1 class="">{{$website->directory}}</h1>
        <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
             title="Deze Website voldoet 100% aan de AVG!">
        <p>{{$website->frameworkVersion()}}</p>
        <p>*nieuwste versie is {{$latestVersions->latestLaravel()}}</p>
        <hr>
        <h2 class="h2">Plugins en helpers van {{$website->directory}}</h2>
        <div id="plugins" class="">
            @foreach($website->plugins() as $plugin)
                <p>{{$plugin}}</p>
            @endforeach
        </div>
    </div>
</div>


</body>
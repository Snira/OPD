@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <h1 class="h1">{{$website->name}}</h1>
        <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip" title="Deze Website voldoet 100% aan de AVG!">
        <p>{{$website->framework}}</p><p>*nieuwste versie is {{$latestVersions->laravel}}</p>
        <hr>
    </div>
</div>


</body>
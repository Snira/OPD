@php
    $versionf = (float)$website->frameworkVersion();
    $latestf = (float)$latestVersions->{$website->framework}();
    $statusf = $latestf - $versionf;

    $versionp = (float) $website->phpVersion();
    $latestp = (float) $latestVersions->php();
    $statusp = $latestp - $versionp;
@endphp

<table class="table">
    <thead>
    <h3 class="h3">Versies</h3>
    <tr class="blue">
        <th scope="col">Status</th>
        <th scope="col">Type</th>
        <th scope="col">Gebruikte Versie</th>
        <th scope="col">Nieuwste Release</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">
            @if($statusf < 1.0)
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Dit framework voldoet aan de eisen">
            @else
                <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                     title="Dit framework is mogelijk verouderd">
            @endif
        </th>
        <td>Framework</td>
        <td>{{$website->framework}} {{$versionf}}</td>
        <td>{{$website->framework}} {{$latestf}}</td>
    </tr>
    <tr>
        <th scope="row">
            @if($statusp < 1.7)
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Deze php versie voldoet">
            @else
                <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                     title="Deze php versie is verouderd en te exploiteren">
            @endif
        </th>
        <td>PHP CLI</td>
        <td>{{$versionp}}</td>
        <td>{{$latestp}}</td>
    </tr>
    <tr>
        <th scope="row">Status</th>
        <td>Onderdeel</td>
        <td>Versie</td>
        <td>Laatste versie</td>
    </tr>
    </tbody>
</table>
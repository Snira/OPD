@php
    $version = (float)$website->frameworkVersion();
    $latest = (float)$latestVersions->{$website->framework}();
    $status = $latest - $version;

@endphp

<table class="table">
    <thead>
    <h2 class="h3">Belangrijkste Onderdelen</h2>
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
            @if($status < 1.0)
                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                     title="Dit framework voldoet aan de eisen">
            @else
                <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                     title="Dit framework is mogelijk verouderd">
            @endif
        </th>
        <td>Framework</td>
        <td>{{$website->framework}} {{$version}}</td>
        <td>{{$website->framework}} {{$latest}}</td>
    </tr>
    <tr>
        <th scope="row">Status</th>
        <td>Onderdeel</td>
        <td>Versie</td>
        <td>Laatste versie</td>
    </tr>
    </tbody>
</table>
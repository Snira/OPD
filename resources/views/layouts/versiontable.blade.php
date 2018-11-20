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
            <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                 title="Framework is niet verouderd"></th>
        <td>Framework</td>
        <td>{{$website->frameworkVersion()}} ({{$website->framework}})</td>
        <td>{{$latestVersions->{$website->framework}()}}</td>
    </tr>
    <tr>
        <th scope="row">Status</th>
        <td>Onderdeel</td>
        <td>Versie</td>
        <td>Laatste versie</td>
    </tr>
    </tbody>
</table>
<div class="block">
    <table class="table">
        <thead>
        <h3 class="h3">Checklist</h3>
        <tr class="darkblue">
            <th scope="col">Status</th>
            <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>
                @if($website->online())
                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                         title="{{$website->name()}} is bereikbaar">
                @else
                    <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                         title="{{$website->name()}} is niet bereikbaar">
                @endif
            </th>
            <td>Website bereikbaar?</td>

        </tr>
        <tr>
            <th>
                @if($website->https())
                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                         title="{{$website->name()}} heeft een geldig SSL-Certificaat">
                @else
                    <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                         title="{{$website->name()}} heeft geen geldig SSL-Certificaat">
                @endif
            </th>
            <td><a href="{{route('avg')}}#https" class="linkavg" data-toggle="tooltip"
                   target="_blank" title="Klik!">SSL-Certificaat?</a></td>

        </tr>
        </tbody>
    </table>
</div>
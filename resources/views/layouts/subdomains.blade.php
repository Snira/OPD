{{--Kolom voor subdomeinen--}}
<div class="block">
    <table class="table">
        <thead>
        <h3 class="h3">Alle websites</h3>
        <tr class="blue">
            <th scope="col">Status</th>
            <th scope="col">Website</th>
        </tr>
        </thead>
        <tbody>
        @foreach($website->subDomains() as $domain)
            <tr>
                <td>
                    @if($domain->status($website->directory,$domain->directory) == 0)
                        <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                             title="Deze website lijkt oké!">
                    @elseif($domain->status($website->directory,$domain->directory) <= 2)
                        <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                             title="Deze website heeft aandacht nodig">
                    @else
                        <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                             title="Deze website loopt risico's!">
                    @endif
                </td>
                <td><a class="link blue"
                       href="{{route('subdomain', [$server->nodeName(), $website->directory, $domain->directory])}}">{{$domain->directory}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$website->subDomains()->setPath($website->name())->render()}}

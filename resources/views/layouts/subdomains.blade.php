{{--Kolom voor subdomeinen--}}

<div style="margin-left: -5%" class="col-9">
    <div class="block">
        <table class="table">
            <thead>
            @if(\Route::currentRouteName() == 'search')
                <h3 class="h3">Zoekresultaten</h3>
            @else
                <h3 class="h3">Alle websites</h3>
            @endif

            <form method="POST" action="{{route('search',[$server->nodeName(), $website->directory])}}">
                {{csrf_field()}}
                <input class="float-right" type="text" id="search" name="search" placeholder="Zoek naar website...">
            </form>

            <tr class="darkblue">
                <th scope="col">Status</th>
                <th scope="col">Website</th>
            </tr>
            </thead>
            <tbody>
            @foreach($domains as $domain)
                <tr>
                    <td>
                        <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                             title="Deze website heeft aandacht nodig">
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
</div>




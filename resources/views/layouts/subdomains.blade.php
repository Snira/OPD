{{--Kolom voor subdomeinen--}}

<div id="table" style="margin-left: -5%" class="col-9">
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
                    <td><a class="link blue" onclick="load('{{$domain->directory}}')"
                           href="{{route('subdomain', [$server->nodeName(), $website->directory, $domain->directory])}}">{{$domain->directory}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$website->subDomains()->setPath($website->name())->render()}}
</div>

<script>
    function load(name){
       $('#table').replaceWith('<div id="loading"><p>Laden van '+ name +'...</p> <br> <p>Dit kan enkele seconden duren, afhankelijk van het aantal fouten</p></div>');
       $('.container').append('<div class="loader"></div>');
    }
</script>


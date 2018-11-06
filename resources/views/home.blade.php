@extends('layouts.app')
<body>
<div class="container">
    @foreach($servers as $server)
        <div class="server">
            <a href="{{route('server',$server->nodename)}}" class="h1 link">{{$server->nodename}}</a>
            <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip" title="Deze Server voldoet 100% aan de AVG!">
            <p>{{$server->OSVersion}}</p>
            <hr>
            <h3 class="h3">Websites</h3>
            <ul>
                @foreach($server->websites as $website)
                    <li>
                        <a class="h3 link" href="{{route('website',$website->name)}}">{{$website->name}}</a>
                        <p>{{$website->framework}}</p>

                        {{--<div id="plugins" class="">--}}
                        {{--@foreach($website->plugins as $plugin)--}}
                        {{--<p>{{$plugin}}</p>--}}


                        {{--@endforeach--}}
                        {{--</div>--}}
                    </li>
                @endforeach
            </ul>
        </div>

    @endforeach

</div>


</body>
</html>

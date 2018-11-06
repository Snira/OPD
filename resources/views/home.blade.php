@extends('layouts.app')
<body>
<header>
    <h1 class="">Dashboard</h1>
</header>
<div class="container">
    @foreach($servers as $server)
        <div class="server">
            <a href="{{route('server',$server->nodename)}}" class="h1">{{$server->nodename}}</a>
            <p>{{$server->kernelversion}}</p>
            <hr>
            <h3 class="h3">Websites</h3>
            <ul>
                @foreach($server->websites as $website)
                    <li>
                        <a class="h3" href="{{route('website',$website->name)}}">{{$website->name}}</a>
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

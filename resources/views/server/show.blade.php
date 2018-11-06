@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <h1 class="h1">{{$server->nodename}}</h1>
        <p>{{$server->kernelversion}}</p>
        <hr>
        <h2 class="h2">Websites</h2>
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
</div>


</body>
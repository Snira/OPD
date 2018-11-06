@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <div class="server-header">
            <h1 class="h1">{{$server->nodename}}</h1>
            <p>{{$server->OSVersion}}</p>
            <p>{{$server->kernelversion}}</p>

        </div>
        <hr>
        <div>
            <h2>CPU Info</h2>
            @foreach($server->CPUInfo as $info)
                <p>{{$info}}</p>
            @endforeach
        </div>
        <hr>
        <div>
            <h2 class="h2">Websites</h2>
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

    </div>
</div>


</body>
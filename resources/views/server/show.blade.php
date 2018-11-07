@extends('layouts.app')
<body>
<div class="container">
    <div class="server">
        <div class="server-header">
            <h1 class="h1">{{$server->nodeName()}}</h1>
            <p>{{$server->OSVersion()}}</p>
            <p>{{$server->kernelVersion()}}</p>

        </div>
        <hr>
        <div>
            <h2>CPU Info</h2>
            @foreach($server->CPUInfo() as $info)
                <p>{{$info}}</p>
            @endforeach
        </div>
        <hr>
        <div>
            <h2 class="h2">Websites</h2>
            <ul>
                @foreach($server->websiteCollection() as $website)
                    <li>
                        <a class="h3 link" href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                        <p>{{$website->frameworkVersion()}}</p>
                        {{--<p>{{$latestVersions->laravel}}</p>--}}

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
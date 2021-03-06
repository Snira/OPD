@php
    /** @var $website \App\Website
    ** @var $server \App\Server
    */
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="head">
                    <h1 class="h1">{{$server->nodeName()}}</h1>

                </div>
            </div>
            <div class="col-6">
                <div class="block">
                    <a class="h3 blue" href="{{route('avg')}}#servers" data-toggle="tooltip"
                       target="_blank" title="Waarom is dit belangrijk?">Server Checklist </a>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">
                                @if(1)
                                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                                         title="Deze OS voldoet aan de eisen">
                                @else
                                    <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                                         title="Deze OS is mogelijk verouderd">
                                @endif
                            </th>
                            <td>Besturingssysteem</td>
                            <td>{{$server->OSVersion()}}</td>
                        </tr>

                        <tr>
                            <th scope="row">
                                @if($server->kernelUpToDate())
                                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                                         title="Deze kernel voldoet">
                                @else
                                    <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                                         title="Deze kernel heeft een update nodig">
                                @endif
                            </th>
                            <td>Kernels</td>
                            <td>
                                {{$server->kernelVersion()}}
                            </td>
                        </tr>
                        @if($server->plesk())
                            <tr>
                                <th scope="row">
                                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                                         title="Deze server gebruikt een recente versie van Plesk">
                                </th>
                                <td>Plesk</td>
                                <td>{{$server->plesk()}}
                                </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-6">
                <div class="block">
                    <table class="table">
                        <thead>
                        <h3 class="h3">Websites</h3>
                        <tr class="darkblue">
                            <th scope="col">Status</th>
                            <th scope="col">Website</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($server->websiteCollection() as $website)
                            <tr>
                                @if($website instanceof \App\Website)
                                    <td>

                                        <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                                             title="Deze website heeft aandacht nodig">

                                    <td><a class="h4 link" onclick="load('{{$website->directory}}')"
                                           href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                        <p>{{$website->frameworkVersion()}} {{$website->framework}}</p></td>


                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="block">
                    <h2 class="h2">
                        Subdomeinen
                    </h2>
                    <ul>
                        @foreach($server->websiteCollection() as $website)
                            @if($website instanceof \App\Directory)
                                <li>
                                    <a class="h4 link" onclick="load('{{$website->directory}}')"
                                       href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                    @endif
                                </li>
                                @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function load(name){
            $('.row').replaceWith('<div id="loading"><p>Laden van '+ name +'...</p> <br> <p>Dit kan enkele seconden duren, afhankelijk van het aantal fouten</p></div>');
            $('.container').append('<div class="loader"></div>');
        }
    </script>
@endsection
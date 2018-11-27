@extends('layouts.app')
<body>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="head">
                <h1 class="h1">{{$server->nodeName()}}</h1>

            </div>

        </div>
        <div class="col-6">
            <div class="block">
                <h3 class="h3">Checklist</h3>
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
                            @if(1)
                                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                                     title="Deze kernel voldoet aan de eisen">
                            @else
                                <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                                     title="Deze kernel is mogelijk verouderd">
                            @endif
                        </th>
                        <td>Kernel</td>
                        <td>{{$server->kernelVersion()}}  <i class="fa fa-exclamation-circle"
                                                                   data-toggle="tooltip"
                                                                   title="Het updaten van een kernel is belangrijk voor de beveiliging van de server"></i>
                        </td>
                    </tr>
                    @if($server->plesk())
                        <tr>
                            <th scope="row">
                                <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                                     title="Deze server gebruikt Plesk">
                            </th>
                            <td>Plesk</td>
                            <td>
                            </td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-6">
            <div class="block">
                <h2 class="h2">
                    Websites
                </h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if($website instanceof \App\Website)
                            <li>
                                <a class="h4 link"
                                   href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>
                                <p>{{$website->frameworkVersion()}} {{$website->framework}}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>


                <h2 class="h2">
                    Subdomeinen
                </h2>
                <ul>
                    @foreach($server->websiteCollection() as $website)
                        @if($website instanceof \App\Directory)
                            <li>
                                <a class="h4 link"
                                   href="{{route('website',[$server->nodeName(), $website->directory])}}">{{$website->directory}}</a>

                                @endif
                            </li>
                            @endforeach
                </ul>

            </div>
        </div>

    </div>


</div>


</body>
@php
    if ($website instanceof \App\Website){
    $webstatus = 0;
        $plugins = $website->plugins();
        if (count($plugins) < 4){
        $webstatus++;
        }
    }
@endphp
@extends('layouts.app')
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="head">
                @if($website instanceof \App\Website)
                <a href="https://{{$website->name()}}" target="_blank" class="h1 link" data-toggle="tooltip"
                   title="Klik om de website te openen">{{$website->name()}}</a>
                @else
                    <h1 class="h1">{{$website->name()}}</h1>
                @endif
                @if(isset($webstatus) && $webstatus == 0)
                    <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                         title="Deze Website voldoet aan de regelgeving">
                @elseif(isset($webstatus) && $webstatus != 0)
                    <img src="/img/redx.png" class="checkmark" data-toggle="tooltip"
                         title="Deze website heeft aandacht nodig">
                @endif
            </div>

        </div>

        <div class="col-6">
            <div class="block">
                @if($website instanceof \App\Website)
                    @include('.layouts.checklist')
                    @include('.layouts.versiontable')
                @else
                    @include('layouts.subdomains')
                @endif

            </div>
        </div>

        @if($website instanceof \App\Website)
            {{--Kolom voor plugins--}}
            <div class="col-6">
                <div class="block">
                    <h2 class="h3">Plugins
                        @if(count($plugins) < 4)
                            <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                                 title="Er zijn problemen met het laden van de plugins">
                        @endif
                    </h2>

                    <hr>
                    <ul id="plugins" class="">
                        @foreach($plugins as $plugin)
                            <li><p>{{$plugin}}</p></li>
                        @endforeach

                    </ul>
                </div>
                {{$plugins->setPath($website->name())->render()}}
            </div>


        @endif
    </div>

</div>


</body>
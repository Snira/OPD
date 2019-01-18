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
@section('content')
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
                @if($website instanceof \App\Website)
                    @if(isset($webstatus) && $webstatus == 0)
                        <img src="/img/checkmark.png" class="checkmark" data-toggle="tooltip"
                             title="Deze Website voldoet aan de regelgeving">
                    @elseif(isset($webstatus) && $webstatus =! 0 && $webstatus < 2)
                    <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                         title="Deze website heeft aandacht nodig">
                    @else
                        <img src="/img/warning.png" class="checkmark" data-toggle="tooltip"
                             title="Deze website loopt risico!">
                    @endif
                @endif
            </div>
        </div>


        @if($website instanceof \App\Website)
            <div class="col-6">
                @include('.layouts.checklist')
                @include('.layouts.versiontable')
            </div>
        @else
            <div class="col-12">
                @include('layouts.subdomains')
            </div>
        @endif

        @if($website instanceof \App\Website)
            {{--Kolom voor plugins--}}
            <div class="col-6">
                <div class="block">
                    <a class="h3 linkavg" href="{{route('avg')}}#plugins" data-toggle="tooltip"
                                       target="_blank" title="Dit is belangrijk, klik en lees waarom!">Plugins
                    </a>
                    @if(count($plugins) < 5)
                        <img src="/img/redx.png" class="checkmark" height="20%" data-toggle="tooltip"
                             title="Er zijn problemen met het laden van de plugins">
                        @else
                        <img src="/img/checkmark.png" class="checkmark" height="20%" data-toggle="tooltip"
                             title="Plugins geven geen foutmeldingen">
                    @endif
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
@endsection
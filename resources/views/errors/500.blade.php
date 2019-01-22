@extends('errors::illustrated-layout')
@section('code', '500')
@section('title', __('Error'))

@section('image')
    <div style="background-image: url({{ asset('/svg/500.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('De server kon niet bereikt worden. Dit ligt vermoedelijk aan de drukte van en naar deze server. Herlaadt de pagina om het opnieuw te proberen.'))

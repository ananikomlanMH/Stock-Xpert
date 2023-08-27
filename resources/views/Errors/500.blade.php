@php
    header("HTTP/1.1 500 Internal Server Error");
@endphp

@if(empty($_SESSION["username"]))
    @extends('layouts.layout')
@endif

@section('title', '500')

@section('content')
    <div class="countainer-404">
        <div class="img">
            <img src="/vendors/images/svg/500.svg" alt="500">
        </div>
        <div class="content">
            <h1 class="title">Oups ! Ce n’est pas ce que vous cherchiez
            </h1>
            <p>
                Il semble qu'une erreur interne du serveur est survenue. Veuillez réessayer ultérieurement..
            </p>
            <p>
                Tentez à nouveau en revenant à la <a href="">page d'acceuil</a>
            </p><br>
            <p>Voici la panne:</p>
            <p>{!! $message !!}</p>

        </div>
    </div>
@endsection
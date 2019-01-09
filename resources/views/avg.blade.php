@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="block">
                <span id="framework"></span>
                <h1 class="h1">The Big Five</h1>
                <p>Om onze digitale omgevingen te laten voldoen aan de AVG op gebied van beveiliging, zijn er vijf
                    onderdelen waar rekening mee
                    gehouden moet worden.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="block">
                <h2 class="h2">1. Update je frameworks indien mogelijk</h2>
                <p>Een framework zoals Laravel lost veel dingen op zodat jij hier als medewerker niet aan hoeft te
                    denken. De beveiliging van je website is er hier een van.
                    Door dit up-to-date te houden voorkom je exploits van je website zoals SQL injections, wat nog
                    steeds bovenaan de lijst van de
                    <a target="_blank" class="link blue" href="https://www.owasp.org/index.php/Top_10-2017_Top_10"
                       data-toggle="tooltip" title="De wat?">OWASP top 10</a> staat.</p>
                <span id="php"></span>
            </div>
        </div>
        <div class="col-3">
            <img src="/img/typing.gif" alt=""
                 style="height: 180px; width: 260px; border-radius: 5px; margin-top: 0; margin-left: -1%"
                 class="float-left">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <img src="/img/php.png"
                 style="height: 180px; width: 260px; border-radius: 5px; margin-top: 0; margin-left: 0"
                 class="float-left">
        </div>
        <div class="col-9">
            <span id="https"></span>
            <div class="block">
                <h2 class="h2">2. Gebruik een php versie die ondersteunt wordt</h2>
                <p>Ook je PHP versie kan outdated raken. Door gebruik te maken van een oude php versie, geef je
                    kwaadwillende in sommige gevallen erg makkelijk de kans om gegevens
                    van jouw omgevingen te achterhalen. Check daarom via deze applicatie regelmatig de websites op hun php versies.</p>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="block">
                <h2 class="h2">3. Voorzie je websites van een SSL-Certicifaat</h2>
                <p>Door gebruik te maken van HTTPS (HyperText Transfer Protocol: Secure) worden eventuele gegevens
                    tussen je website en de gebruikers beter afgeschermd, door gebruik te maken van
                    nieuwere en veiligere protocollen. Op deze manier maakt de website, zoals noodzakelijk is volgens de AVG, gebruik van pseudonimisering: het versleutelen van gevevens.</p>
            <span id="plugins"></span>
            </div>
        </div>
        <div class="col-3">
            <img src="/img/ssl.png" alt="Groen slotje voor HTTPS" data-toggle="tooltip"
                 title="Een groen slotje geeft aan dat de website een geldig SSL-Certificaat heeft"
                 style="height: 200px; width: 260px; border-radius: 5px; margin-top: 0; margin-left: -1%"
                 class="float-left">
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <img src="/img/plugins.png"
                 style="height: 210px; width: 260px; border-radius: 5px; margin-top: 1.5%; margin-left: 1%"
                 class="float-left">
        </div>
        <div class="col-9">
            <div class="block">
                <h2 class="h2">4. Vergeet niet je plugins van je website te updaten!</h2>
                <p>In veel websites worden verschillende libraries en plugins gebruikt. Sommige van deze zijn voor het
                    regelen van het netwerk van/naar jouw website. Door deze tijdig te updaten
                    voorkom je gaten in je beveiliging.</p>
                <p>Dit dashboard biedt ook de mogelijkheid om per website in te zien welke extra's er gebruikt worden.
                    Loop deze af en toe even na of de versies niet te oud zijn, of dat er
                    onderdelen tussen staan die niet meer gebruikt worden.</p>
                <span id="servers"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="block">
                <h2 class="h2">5. Update je servers!</h2>
                <p>Het beschermen van persoonsgegevens doe je niet alleen door je websites in orde te houden. Ook de
                    servers waar deze opstaan dienen regelmatig opgeschoont te worden.
                    Denk hierbij aan het updaten van het besturingssysteem en de kernel. Door dit te doen zorg je dat
                    onderdelen zoals firewalls goed blijven functioneren, en niet te exploiteren zijn.</p>
            </div>
        </div>
        <div class="col-3">
            <img src="/img/server.jpg"
                 style="height: 200px; width: 260px; border-radius: 5px; margin-top: 1%; margin-left: -1%"
                 class="float-left">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="block">
                <h3 class="h3 darkblue">Bedankt!</h3>
                <p>Door deze punten te onthouden en toe te passen, zorg jij ervoor dat wij veilig omgaan met gegevens
                    van anderen. Dat is niet alleen fijn voor de gebruikers,
                    maar zorgt er ook voor dat wij een betrouwbare partij zijn.</p>
            </div>
        </div>
    </div>
</div>
@endsection



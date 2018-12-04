@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="block">
                <h1 class="h1">The big 6</h1>
                <p>Om onze digitale omgevingen te laten voldoen aan de AVG zijn er zes onderdelen waar rekening mee
                    gehouden
                    moet worden.</p>
            </div>
        </div>
    </div>

    <div id="framework" class="row">
        <div class="col-9">
            <div class="block">
                <h2 class="h2">1. Update je frameworks indien mogelijk</h2>
                <p>Een framework zoals Laravel lost veel dingen op zodat jij hier als medewerker niet aan hoeft te
                    denken. De beveiliging van je website is er hier een van.
                    Door dit up-to-date te houden voorkom je exploits van je website zoals SQL injections, wat nog
                    steeds bovenaan de lijst van de
                    <a target="_blank" class="link blue" href="https://www.owasp.org/index.php/Top_10-2017_Top_10"
                       data-toggle="tooltip" title="De wat?">OWASP top 10</a> staat.</p>
            </div>

        </div>
        <div class="col-3" >
             <img src="/img/typing.gif" alt="" style="height: 180px; border-radius: 5px; margin-top: 0; margin-left: 5%" class="float-left">

        </div>
    </div>
    <div id="php" class="row">

        <div class="col-3">
            <div class="block" style="height: 150px;">
            content block
            </div>

        </div>
        <div class="col-9">
            <div class="block" >
                <h2 class="h2">2. Gebruik een php versie die ondersteunt wordt.</h2>
                <p>Ook je PHP versie kan outdated raken. Door gebruik te maken van een oude php versie, geef je kwaadwillende in sommige gevallen erg makkelijk de kans om gegevens
                van jouw omgevingen te achterhalen.</p>
            </div>
        </div>

    </div>

    <div id="https" class="row">
        <div class="col-9">
            <div class="block" >
                <h2 class="h2">3. Voorzie je websites van een SSL-Certicifaat</h2>
                <p></p>
            </div>
        </div>
        <div class="col-3">
            <div class="block">
            content block
            </div>

        </div>

    </div>


</div>




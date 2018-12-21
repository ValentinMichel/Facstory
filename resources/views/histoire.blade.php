@extends('layouts.app')
@section('content')
    {{-- Affiche les erreurs --}}
    <section class="descriptif">
    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="presentation">
        <div class="ressources">
            <svg id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 538.2 483.41"><defs><style>.cls-1{fill:#e14b5c;}.cls-2,.cls-3,.cls-7{fill:none;stroke-miterlimit:10;}.cls-2{stroke:#9588aa;}.cls-3{stroke:#fff;}.cls-4{fill:#9588aa;}.cls-5{fill:#55495b;}.cls-6{fill:#424a60;}.cls-7{stroke:#55495b;}.cls-8{fill:#ee7162;}</style></defs><title>sharity - Copie</title><path class="cls-1" d="M411.33,391.57s-31.88,42.5,18.35,55.06S542,397.29,555.27,380.78s45.4-72.29,10.63-94.51-54.1,28-87.91-6.76,58.92-100.47,3.86-116.9-108.2,66.66-131.38,59.9-1.94-42.29-23.19-52.17-67.38,39.13-78.25,56-13.52,34-13.52,77.86,28.79-9.86,32.84,12.95-64.72,94.68,15.46,86.95,117.62-61.83,132.35-57S411.33,391.57,411.33,391.57Z" transform="translate(-148.18 -77.36)"/><circle class="cls-2" cx="9.01" cy="245.08" r="8.51"/><circle class="cls-3" cx="277.85" cy="65.15" r="8.51"/><circle class="cls-3" cx="477.61" cy="361.53" r="8.51"/><rect class="cls-4" x="401.29" y="11.83" width="4.83" height="18.84" rx="2.42" ry="2.42"/><rect class="cls-4" x="549.47" y="89.68" width="4.83" height="18.84" rx="2.42" ry="2.42" transform="translate(502.8 -530.15) rotate(90)"/><rect class="cls-5" x="205.42" y="77.36" width="4.83" height="18.84" rx="2.42" ry="2.42" transform="translate(146.43 -198.41) rotate(90)"/><rect class="cls-5" x="205.42" y="77.36" width="4.83" height="18.84" rx="2.42" ry="2.42" transform="translate(267.48 96.2) rotate(180)"/><path class="cls-6" d="M501.79,203.38" transform="translate(-148.18 -77.36)"/><path class="cls-6" d="M400.78,304.38" transform="translate(-148.18 -77.36)"/><path class="cls-6" d="M342.27,218.52" transform="translate(-148.18 -77.36)"/><path class="cls-7" d="M329.84,560.27c2.69-.31,6.32-14.07,5.41-15.58s-15.49-1.51-17,0S327.14,560.57,329.84,560.27Z" transform="translate(-148.18 -77.36)"/><path class="cls-3" d="M680.33,226.4c2.7-.3,6.32-14.06,5.41-15.57s-15.49-1.51-17,0S677.63,226.71,680.33,226.4Z" transform="translate(-148.18 -77.36)"/><path class="cls-8" d="M545.11,351.89" transform="translate(-148.18 -77.36)"/></svg>
            <img class="ilu" src= "../../img/Benson_character(1).png">
        </div>
        <div class="informations">

            <div class="title-story">{{$histoire->titre}}</div>
        <div class="date">Créee le : {{ $histoire->created_at}}<br></div>
           <div class="resume">{{$histoire->pitch}}</div>

            <a class="button-lire" href="{{route("lire_chapitreEnr",['id' => $histoire->premierChapitre()->id])}}">Lire l'histoire</a>
    </div>
    </div>
        </section>
@endsection

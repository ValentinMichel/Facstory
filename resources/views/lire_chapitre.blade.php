@extends('layouts.app')
@section('content')
    {{-- Affiche les erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="corps2">
        <div class="global">
    <div class="short-title">{{$chapitre->titrecourt}} </div>
            <hr>


    <div class="divHistoires">
        <img class="imageHistoires" src="{{$chapitre->photo}}">
    </div>
    <div class="paragraphe">
        {!! $chapitre->texte !!}
    </div>
    <div>
        @if($chapitre->question == null)
        C'est la fin !!!!
        @else
            {!! $chapitre->question !!}
            <br>
            @foreach($chapitre-> suites as $suite)
                <div class="possibilite">
                <a  href="{{route('lire_chapitreEnr',['chapitre'=>$suite->id])}}">{{$suite->pivot->reponse}}</a>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    </div>
@endsection

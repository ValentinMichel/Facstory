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
    <div class="corps">
        <div class="global">
    <h1>Liste de vos histoires :</h1>
    @if(!(count($histoire) === 0))
        <form action="{{route('active_histoire')}}" method="POST" id="form">
            {{csrf_field()}}
            <table class="table">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td class="header-lol">N° Histoire</td>
                <td class="header-lol">Titre</td>
                <td class="header-lol">Descrition</td>
                <td class="header-lol">Genre</td>
                <td class="header-lol">Visibilité</td>
                <td class="header-lol">Créée le</td>
                <td class="header-lol">Dernière update</td>
                <td class="header-lol">Liaison</td>
                <td class="header-lol">ON/OFF</td>
            </tr>
            </thead>
            <tbody>

            @foreach($histoire as $hist)
                @if(\Illuminate\Support\Facades\Auth::user()->id == $hist->user_id)
                    <tr>
                        <td>{{$hist->id}}</td>
                        <td>{{$hist->titre}}</td>
                        <td>{{$hist->pitch}}</td>
                        <td>{{$hist->genre_id}}</td>
                        <td>
                            @if($hist->active == '1')
                                <span style="color: green;">Visible</span>
                            @else
                                <span style="color: red;">Invisible</span>
                            @endif
                        </td>
                        <td>{{$hist->created_at}}</td>
                        <td>{{$hist->updated_at}}</td>
                        <td>
                            <a href="{{ route('lier_chapitre', [$hist->id]) }}">Lier</a>
                        </td>
                        <td>
                            <input type="checkbox" name="{{'active.'.$hist->id}}" id="{{'active'.$hist->id}}"  {{($hist->active ? "checked" : "")}}>
                        </td>
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-success" type="submit" id="bouton">Valider</button>
        </div>
        </form>
        </div>
    </div>

    @endif
    <script>
        $("#bouton").click(function(e) {
            e.preventDefault();
            $("#form").submit();
        });
    </script>
@endsection  
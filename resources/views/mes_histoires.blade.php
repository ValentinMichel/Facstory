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
                <th class="header-lol">N° Histoire</th>
                <th class="header-lol">Titre</th>
                <th class="header-lol">Descrition</th>
                <th class="header-lol">Genre</th>
                <th class="header-lol">Visibilité</th>
                <th class="header-lol">Créée le</th>
                <th class="header-lol">Dernière update</th>
                <th class="header-lol">Liaison</th>
                <th class="header-lol">ON/OFF</th>
            </tr>
            </thead>
            <tbody>
            @if (Auth::user())
                @foreach($histoire as $hist)
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $hist->user_id)
                        <tr>
                            <td>{{$hist->id}}</td>
                            <td>{{$hist->titre}}</td>
                            <td>{{$hist->pitch}}</td>
                            <td>
                                @php($listeGenre = DB::table('genre')->get())
                                @foreach($listeGenre as $genre)
                                    @if($genre->id == $hist->genre_id)
                                        {{$genre->label}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($hist->active == '1')
                                    <span style="color: #38c172; text-shadow: 0px 0px 13px greenyellow">Visible</span>
                                @else
                                    <span style="color: #e14b5c; text-shadow: 0px 0px 15px coral">Invisible</span>
                                @endif
                            </td>
                            <td>{{$hist->created_at}}</td>
                            <td>{{$hist->updated_at}}</td>
                            <td>
                                <button class="button_lier"><a href="{{ route('lier_chapitre', [$hist->id]) }}">Lier</a></button>
                            </td>
                            <td>
                                <input type="checkbox" name="{{'active.'.$hist->id}}" id="{{'active'.$hist->id}}"  {{($hist->active ? "checked" : "")}}>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
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
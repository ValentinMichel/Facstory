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
        <table class="table_creaC">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td class="header_creaC">Histoire</td>
                <td class="header_creaC">Titre</td>
                <td class="header_creaC">Descrition</td>
                <td class="header_creaC">Genre</td>
                <td class="header_creaC">Visibilité</td>
                <td class="header_creaC">Créée le</td>
                <td class="header_creaC">mise a jour</td>
            </tr>
            </thead>
            <tbody>
            @foreach($histoire as $hist)
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
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div role="alert">Vous n'êtes l'auteur d'aucune histoire, créez-en une pour pouvoir y ajouter des chapitres. </div>
    @endif

    <form class="form_creaC" action="{{route('enregistrer_chapitre')}}" method="POST">
        {!! csrf_field() !!}
        <div class="head_creaC" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'un chapitre</h3>

        </div>
        <div class="form-group_creaC">
            <label class="col-md-3 form-control-label" for="histoire_id"><strong>Associé à l'histoire : </strong></label>

            <div class="input-group date">
                <select name="histoire_id" id="histoire_id">
                    @foreach($histoire as $hist)
                        <option value="{{$hist->id}}">{{$hist->titre}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group_creaC">


            <div class="input-group date">
                <input type="text" class="form-control" name="titre" id="titre"
                       value="{{ old('titre') }}" class="form-control"
                       placeholder="Titre du chapitre">
            </div>

        </div>
        <div class="form-group_creaC">


            <div class="input-group date">
                <input type="text" class="form-control" name="titrecourt" id="titrecourt"
                       value="{{ old('titrecourt') }}" class="form-control"
                       placeholder="Titre court du chapitre">
            </div>

        </div>
        <div class="form-group_creaC">
            <label class="col-md-3 form-control-label" for="titre"><strong>Est-ce le premier chapitre : </strong></label>

            <div class="input-group date">
                <input type="radio" name="premier" value="1" id="premier-on" /> <label style="margin-left: 15px; margin-right: 15px;" for="moins15">Oui</label>
                <input type="radio" name="premier" value="0" id="premier-off" /> <label style="margin-left: 15px;" for="moins15">Non</label>
            </div>

        </div>
        <div class="form-group_creaC">
            <label class="col-md-3 form-control-label" for="texte"><strong>Votre texte : </strong></label>

            <div class="input-group date">
                   <textarea class="form-control" name="texte" id="texte" value="{{ old('texte') }}">

                   </textarea>
            </div>

        </div>
        <div class="form-group_creaC">
            <label class="col-md-3 form-control-label" for="photo"><strong>Photo : </strong></label>

            <div class="input-group date">
                <textarea name="photo" id="photo" rows="6" class="form-control" value="{{old('photo')}}" placeholder="Insérer le lien de votre photo..."></textarea>
            </div>

        </div>
        <div class="form-group_creaC">


            <div class="input-group date">
                <input type="text" class="form-control" name="question" id="question"
                       value="{{ old('question') }}" class="form-control"
                       placeholder="Question">
            </div>

        </div>
        <div class="footer_creaC">
            <button class="btn btn-success" type="submit">Valider</button>
        </div>
    </form>
    </div>
    </div>

@endsection

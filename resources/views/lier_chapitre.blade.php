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

    <form action="{{route('enregistrer_liaison')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'une liaison entre chapitre {{$histoire->titre}}</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="histoire_id"><strong>Chapitre source : </strong></label>
            <div class="col-md-3">
                <div class="input-group date">
                    <select name="chapitre_source_id" id="chapitre_source_id" class="form-control">
                        @foreach($histoire->chapitres as $chapitre)
                            @if($chapitre->question != null)
                            <option value="{{$chapitre->id}}">{{$chapitre->titrecourt}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="histoire_id"><strong>Chapitre destination : </strong></label>
            <div class="col-md-3">
                <div class="input-group date">
                    <select name="chapitre_destination_id" id="chapitre_destination_id" class="form-control">
                        @foreach($histoire->chapitres as $chapitre)
                            <option value="{{$chapitre->id}}">{{$chapitre->titrecourt}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="reponse"><strong>Question : </strong></label>
            <div class="col-md-6">
                <div class="input-group date">
                    <input type="text" class="form-control" name="reponse" id="reponse"
                           value="{{ old('reponse') }}" class="form-control"
                           placeholder="Votre réponse...">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-success" type="submit">Valider</button>
        </div>
    </form>

@endsection

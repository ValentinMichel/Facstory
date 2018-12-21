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

    <div class="container_creaH">
    <form class="form_creaH" action="{{route('enregistrer_histoire')}}" method="post">{{csrf_field()}}

            <div class="head_creaH">
                <h3>Création d'une Histoire</h3>
                <p>Ici, laissez place à votre imaginations en créant votre propre histoire !</p>
            </div>
            <div class="prop_creaH">
                <input type="text" name="titre" placeholder="Titre de votre histoire">
            </div>

            <div class="prop_creaH">
                <textarea  name="pitch" placeholder="Le Pitch de votre histoire"  ></textarea>
            </div>

            <div class="prop_creaH">
                <input type="text" name="photo" id="photo" placeholder="lien de votre photo : http://">
            </div>

            <div class="prop_creaH">
                <label class="genre_creaH" for="genre">Genre</label>
                <select name="genre" size="1">
                    @foreach($genres as $g)
                        <option value="{{$g->id}}">{{$g->label}}</option>
                        @endforeach
                </select>
            </div>
            <div class="btn_creaH">
                <input type="submit" value="Envoyer"/>
            </div>



    </form>
    </div>


@endsection
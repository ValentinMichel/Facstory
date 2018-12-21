<?php

namespace App\Http\Controllers;

use App\Genre;

use App\Histoire;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class ControleurCreation extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //---------------------------------------------------------
    public function creerHistoire() {
        return view('creer_histoire', ["genres" => Genre::all()]);
    }

    public function enregistrerHistoire(Request $request) {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'pitch' => 'required',
                'photo' => 'nullable',
                'genre' => 'required'
            ]
        );
        $input = $request->only(['titre', 'pitch', 'photo', 'genre','public']);
        DB::table('histoire')->insert(
            [
                'user_id' => Auth::user()->id,
                'titre' => $input['titre'],
                'pitch' => $input['pitch'],
                'photo' => $input['photo'],
                'genre_id' => $input['genre'],
                'active' => 0,
            ]
        );

        return redirect('/');
    }
    public function activeHistoire(Request $request){
        $histoires = Histoire::where('user_id',Auth::id())->get();
        $lesActives = $request->input();
        //var_dump($lesActives); exit(1);
        $ids = [];
        foreach($histoires as $h) {
            $ids[$h->id] = $h -> active;
        }
        $actives = [];
        foreach ($lesActives as $cle => $elt) {
            if (substr( $cle, 0, 7 ) === "active_") {
                $id = substr( $cle, 7 );
                $val = ($elt == 'on' ? 1 : 0);
                $actives[$id] = 1;
                $histoire = Histoire::find($id);
                $histoire->active = $val;
                $histoire->save();
            }
        }
        //var_dump($actives); exit(1);
        foreach($histoires as $h) {
            if ( $h->active && (!isset($actives[$h->id]))) {
                $histoire = Histoire::find($h->id);
                $histoire->active = 0;
                $histoire->save();
            }
        }

/*      var_dump($ids); exit(1);
        $input = $request->only(['active']);
        DB::table('histoire')->update(
            [
                'active' => (isset($input['active'])? 1:0),
            ]
        );*/
        return redirect('/liste/');
    }



    //---------------------------------------------------------

    public function creerChapitre() {
        $histoires = DB::table('histoire')->get();
        return view('creer_chapitre',['histoire'=>$histoires]);
    }

    public function enregistrerChapitre(Request $request) {
        $this->validate(
            $request,
            [
                'histoire_id' => 'required',
                'titre' => 'nullable',
                'titrecourt' => 'required',
                'photo' => 'nullable',
                'texte' => 'required',
                'question' => 'nullable',
                'premier' => 'required',
            ]
        );
        $input = $request->only(['histoire_id','titre','titrecourt','photo','texte','question','premier']);
        DB::table('chapitre')->insert(
            [
                'histoire_id' => $input['histoire_id'],
                'titre' => $input['titre'],
                'titrecourt' => $input['titrecourt'],
                'photo' => $input['photo'],
                'texte' => $input['texte'],
                'question' => $input['question'],
                'premier' => (isset($input['premier'])? 1:0),
            ]
        );
        return redirect('/');
    }


    //---------------------------------------------------------

    public function lierChapitre($id) {
        $histoire = Histoire::find($id);
        return view('lier_chapitre',['histoire'=>$histoire]);
    }

    public function enregistrerLiaison(Request $request) {
        $this->validate(
            $request,
            [
                'reponse' => 'required',
                'chapitre_source_id' => 'required',
                'chapitre_destination_id' => 'required',
            ]
        );
        $input = $request->only(['reponse','chapitre_source_id','chapitre_destination_id']);
        DB::table('suite')->insert(
            [
                'reponse' => $input['reponse'],
                'chapitre_source_id' => $input['chapitre_source_id'],
                'chapitre_destination_id' => $input['chapitre_destination_id'],

            ]
        );
        return redirect('/liste/');
    }
}

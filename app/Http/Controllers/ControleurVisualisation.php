<?php

namespace App\Http\Controllers;

use App\Chapitre;
use App\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControleurVisualisation extends Controller
{
    public function index() {
        $histoires= Histoire::all();
        return view("index",['histoires'=> $histoires]);
    }

    public function accueil_histoire($id) {
        $histoire= Histoire::find($id);
        return view("histoire",['histoire'=> $histoire]);
    }

    public function lire_histoire($id) {
        $histoire= Histoire::find($id);
        return view("histoire",['histoire'=> $histoire]);
    }

    public function lire_chapitre($id) {
        $chapitre = Chapitre::find($id);

        if(Auth::check()) {
            $maxNumSequence = DB::table('lecture')
                ->where('histoire_id', '=', $chapitre->histoire_id)
                ->where('user_id', Auth::id())
                ->max('num_sequence');
                $numSequence = $maxNumSequence + 1;
                DB::insert("INSERT INTO lecture VALUES(NULL, ?, ?, ?, ?, NULL,NULL)", [Auth::id(), $chapitre->histoire_id, $id, $numSequence]);
            }

        return view("lire_chapitre",['chapitre'=> $chapitre]);
    }




    public function lire_chapitreEnr($id) {
        $chapitre = Chapitre::find($id);

        if(Auth::check()) {
            $maxNumSequence = DB::table('lecture')
                ->where('histoire_id', '=', $chapitre->histoire_id)
                ->where('user_id', Auth::id())
                ->max('num_sequence');

            if (count($maxNumSequence) == 0) { //première lecture
                $numSequence = 1;
                DB::insert("INSERT INTO lecture VALUES(NULL, ?, ?, ?, ?, NULL,NULL)", [Auth::id(), $chapitre->histoire_id, $id, $numSequence]);
            }

            else { // lecture encours
                $derniereLecture = DB::table('lecture')
                    ->where([['user_id','=',Auth::id()],['histoire_id','=',$chapitre->histoire_id],['num_sequence','=',$maxNumSequence],])->first();

                $IDderniereLecture = $derniereLecture->chapitre_id;
                $chapitreLec = Chapitre::find($IDderniereLecture);


                return view("lire_chapitre",['chapitre'=> $chapitreLec]);
            }
        }
        return view("lire_chapitre",['chapitre'=> $chapitre]);
    }


    public function suprimmer($numSeq){
    }

    public function retour(){

    }

    public function mes_histoires(){
        $histoire = DB::table('histoire')->get();
        return view('mes_histoires',['histoire'=>$histoire]);
    }


}

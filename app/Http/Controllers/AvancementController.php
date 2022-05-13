<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Avancement;
class AvancementController extends Controller
{
    //
    public function avancement(Request $request){
        $avancement=new avancement();
        $avancement->apprenant_id=Auth::user()->Apprenant->id;
        $avancement->chapitre_id=$request->input('id');
        $avancement->cour_id=$request->input('id_cour');
        foreach (Auth::user()->Apprenant->avancement as $key ) {
            if ($key->chapitre_id==$avancement->chapitre_id) {
                return  redirect('/apprenant/mesFormations');
            }
        }
               $avancement->save();

                 return  redirect('/apprenant/mesFormations');
                }

}

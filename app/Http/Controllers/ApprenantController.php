<?php

namespace App\Http\Controllers;

use App\Models\chapitre;
use App\Models\formation;
use App\Models\cour;
use App\Models\inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprenantController extends Controller
{
    //
    public function index()
{
    return view("Apprenant.index");
}

public function formations(){
    $formations=new formation();
    $formations= formation::all();
   return view('Apprenant.formations',['formations'=>$formations]);
}
public function view($id){
    $formation=formation::find($id);
    $cours=cour::where('formation_id',$id)->get();
    return view('Apprenant.viewFormation',['formation'=>$formation,'cours'=>$cours]);

}public function viewCour($id){
    $cour=cour::find($id);
    $chapitres=chapitre::where('cour_id',$id)->get();
    return view('Apprenant.viewCour',['cour'=>$cour,'chapitres'=>$chapitres]);
}
public function inscription(Request $request,$itam){

            $inscription=new inscription();
            $inscription->cour_id=$itam->id;
           $inscription->formation_id=$itam->formation->id;
           $inscription->formateur_id=$itam->formation->Formateur->id;
           $inscription->apprenant_id=Auth::user()->id;
          $inscription->save();
          session()->flash('success','l`inscription est enregistre!!!!');
             return  redirect('/formations');}
}

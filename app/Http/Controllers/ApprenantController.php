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

}public function viewCour($id,$id_formation){
    $cour=cour::find($id);
    $chapitres=chapitre::where('cour_id',$id)->get();
    return view('Apprenant.viewCour',['cour'=>$cour,'chapitres'=>$chapitres,'formation'=>$id_formation]);
}
public function inscription(Request $request,$id,$id_formation){
    // //dd($request);
           $inscription=new inscription();
           $inscription->cour_id=$id;
           $inscription->formation_id=$id_formation;
           $inscription->apprenant_id=Auth::user()->id;
          $inscription->save();
          session()->flash('success','l`inscription est enregistre!!!!');
               return view('');}



}

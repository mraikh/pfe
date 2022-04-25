<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Auth;
use App\Models\formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function __construct()
    {$this->middleware('auth');
    }
    public function create(){

        return view('formateur.Create');
    }
    public function store(Request $request){
//dd($request);
      $formation =new formation();
      $formation->formateur_id=Auth::user()->formateur->id;
      $formation->intitule=$request->input('intitule');
      $formation->description=$request->input('description');
      $formation->save();
     session()->flash('success','le formation et enregistre!!!!');
    return redirect('formateur/formations');

    }
    public function index(){
        $formations= formation::where('formateur_id',Auth::user()->formateur->id)->get();
        return view('formateur.salondesFormation',['formations'=>$formations]);
    }
//     public function edit($id){
//         $formation=formation::find($id);
//         return view('formation.edit',['formation'=>$formation]);

//     }
//     public function update(Request $request,$id){
//         $formation=formation::find($id);
//        $formation->titre= $request->input('titre');
//        $formation->presentation= $request->input('presentation');
// $formation->save();
// return redirect('/formations');
//     }
//     public function destroy(Request $request,$id){
//         $formation=formation::find($id);
//         $formation->delete();
//         return redirect('/formations');

//     }

}

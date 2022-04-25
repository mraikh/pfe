<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cour;
use App\Models\Formateur;
use Illuminate\support\Facades\Auth;
use App\Models\formation;


class CourController extends Controller
{
public function __construct()
    {$this->middleware('auth');
    }
    public function create($id){

        return view('formateur.Cours.Create',['id'=>$id]);
    }
    public function store(Request $request,$id){
// //dd($request);
       $cour=new cour();
      $cour->formation_id=$id;
      $cour->intitule=$request->input('intitule');
      $cour->description=$request->input('description');
      $cour->duree=$request->input('duree');
      $cour->save();
      session()->flash('success','le cours et enregistre!!!!');
           return redirect('formateur/formations/'.$id.'/view');}
//     public function index(){
//         $formations= formation::where('formateur_id',Auth::user()->formateur->id)->get();
//         return view('formateur.salondesFormation',['formations'=>$formations]);
//     }
//      public function edit($id){
//          $formation=formation::find($id);
//          return view('formateur.edite',['formation'=>$formation]);

//      }
//    public function update(Request $request,$id){
//          $formation=formation::find($id);
//         $formation->intitule=$request->input('intitule');
//         $formation->description=$request->input('description');
//         session()->flash('success','la modification est enregistre!!!!');
//  $formation->save();
//  return redirect('formateur/formations');
//      }
//      public function destroy(Request $request,$id){
//          $formation=formation::find($id);
//          $formation->delete();
//         return redirect('formateur/formations');}
//         public function view($id){
//             $formation=formation::find($id);
//             $cours=cour::where('formation_id',$id)->get();
// //dd($cours);
//             return view('formateur.viewFormation',['formation'=>$formation,'cours'=>$cours]);

//         }
}

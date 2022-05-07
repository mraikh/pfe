<?php

namespace App\Http\Controllers;

use App\Models\chapitre;
use Illuminate\Http\Request;
use App\Models\cour;
use App\Models\Formateur;
use Illuminate\support\Facades\Auth;
use App\Models\formation;


class CourController extends Controller
{

// public function __construct()
//     {$this->middleware('auth');
//     }
    public function cours(){
        $cours=new cour();
        $cours= cour::all();

        return view('courses',['cours'=>$cours]);
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

     public function edit($id){
          $cour=cour::find($id);
         return view('formateur.Cours.edite',['cour'=>$cour]);

      }

public function update(Request $request,$id){
    // //dd($request);
    $cour=cour::find($id);
           $cour->intitule=$request->input('intitule');
            $cour->description=$request->input('description');
            $cour->duree=$request->input('duree');
         session()->flash('success','la modification est enregistre!!!!');
     $cour->save();
   return redirect('formateur/formations/'.$cour->formation->id.'/view');}

      public function destroy(Request $request,$id){
          $cour=cour::find($id);
          $cour->delete();
         return redirect('formateur/formations/'.$cour->formation->id.'/view');}
     public function view($id){
             $cour=cour::find($id);
   $chapitres=chapitre::where('cour_id',$id)->get();
// // dd($cours);
return view('formateur.Cours.viewChapitres',['chapitres'=>$chapitres,'cour'=>$cour]);

   }
}

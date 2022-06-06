<?php

namespace App\Http\Controllers;

use App\Models\chapitre;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ChapitreController extends Controller
{public function download(Request $request){
    return response()->download($request->pathToFile);

}

    public function create($id){

        return view('formateur.Cours.Chapitre.Create',['id'=>$id]);
    }
    public function store(Request $request,$id){
// //dd($request);
       $chapitre=new chapitre();
      $chapitre->cour_id=$id;
      $chapitre->description=$request->input('description');
      if($request->hasFile('photo')){
        $chapitre->file=$request->file('photo')->store('image');
    }
      $chapitre->save();
      session()->flash('success','le chapitres et enregistre!!!!');
           return redirect('formateur/formations/'.$id.'/view/Cour');}
           public function edit($id){
            $chapitre=chapitre::find($id);
           return view('formateur.Cours.Chapitre.edite',['chapitre'=>$chapitre]);

        }
        public function destroy(Request $request,$id){
            $chapitre=chapitre::find($id);
            $chapitre->delete();
           return redirect('formateur/formations/'.$chapitre->cour->id.'/view/Cour');}

  public function update(Request $request,$id){
      // //dd($request);
      $chapitre=chapitre::find($id);

      $chapitre->description=$request->input('description');
      if($request->hasFile('photo')){
        $chapitre->file=$request->file('photo')->store('image');}
           session()->flash('success','la modification est enregistre!!!!');
       $chapitre->save();
     return redirect('formateur/formations/'.$chapitre->cour->id.'/view/Cour');}
}

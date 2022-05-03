<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Apprenant;
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
/////////////admin
public function indexAdmin()
{
    $Apprenants=Apprenant::all();
    // dd( $formateurs );
     return view('admin.Apprenants',['Apprenants'=>$Apprenants]);
}
public function delete($id)
{
    try {

        $Apprenant = Apprenant::find($id);

        if (empty($Apprenant)) {
            abort(404, "Ce Apprenant n'exist pas dans nos records");
        }
        $Apprenant->delete();

        $Apprenant->user->delete();
        return redirect('admin/Apprenants');

    } catch (HttpException $e) {
        return response()->json($e->getMessage(), $e->getStatusCode());
    }
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

 }
// public function viewCour($id){
//     $cour=cour::find($id);
//     $chapitres=chapitre::where('cour_id',$id)->get();
//     return view('Apprenant.viewCour',['cour'=>$cour,'chapitres'=>$chapitres]);
// }
public function inscription(Request $request){
    $inscription=new inscription();
    $inscription->apprenant_id=Auth::user()->Apprenant->id;
    $inscription->formation_id=$request->input('id');
    foreach (Auth::user()->Apprenant->inscription as $key ) {
        if ($key->formation_id==$inscription->formation_id) {
            return  redirect('/apprenant/view/'.$inscription->formation_id);
        }
    }
           $inscription->save();
          session()->flash('success','l`inscription est enregistre!!!!');
             return  redirect('/apprenant/view/'.$inscription->formation_id);
            }
}

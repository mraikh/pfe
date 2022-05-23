<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Apprenant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
    public function profile()
    {
        $apprenant=Apprenant::find(Auth::user()->apprenant->id);
        return view("Apprenant.profile",['apprenant'=>$apprenant]);
    }
 public function view($id){
      $formation=formation::find($id);
      $cours=cour::where('formation_id',$id)->get();
      return view('Apprenant.viewFormation',['formation'=>$formation,'cours'=>$cours]);
}
public function mesFormations(){
 $inscriptions=inscription::where('Apprenant_id',Auth::user()->Apprenant->id)->get();
    return view('Apprenant.MesFormations',['inscriptions'=>$inscriptions]);
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
            return  redirect('/apprenant/mesFormations');
        }
    }
           $inscription->save();
          session()->flash('success','l`inscription est enregistre!!!!');
             return  redirect('/apprenant/mesFormations');
            }
    public function remove(Request $request)
            {
                try {

                    $inscription = inscription::find($request->input('id'));

                    if (empty($inscription)) {
                        abort(404, "Ce inscription n'exist pas dans nos records");
                    }
                    $inscription->delete();
                    return redirect('formateur/indexApprenant');

                } catch (HttpException $e) {
                    return response()->json($e->getMessage(), $e->getStatusCode());
                }
            }
            public function Editeprofile(Request $request)
            { $id=$request->input('id');
                $Apprenant=Apprenant::find(Auth::user()->Apprenant->id);
                return view("Apprenant.Editeprofile",['id'=>$id,'Apprenant'=>$Apprenant]);
            }
            public function ajouterPhotoprofile(Request $request)
            { $validator = Validator::make($request->all(), [
                'id' => 'required|numeric',
                'photo' => 'required',

            ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 401);
                }

                $validated = $validator->validated();
                 $user=User::find( $validated['id']);
                $user->photo= $validated['photo']->store('photo');
                $user->save();
                return redirect('apprenant/profile') ;
            }
            public function updateprofile(Request $request)
    {


            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:apprenants,id',
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'ecole' => 'required|string',
                'niveau_etu' => 'required|string|max:120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

        $apprenant = Apprenant::find($validated['id']);
       $user=User::find($apprenant->user_id);
       $user->name= $validated['name'];
       $user->email= $validated['email'];
        $apprenant->name = $validated['name'];
            $apprenant->niveau_etu= $validated['niveau_etu'];
            $apprenant->ecole=$validated['ecole'];
            $apprenant->save();
            $user->save();
return redirect('apprenant/profile') ;
        }}

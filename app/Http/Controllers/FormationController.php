<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\cour;
use App\Models\Formateur;
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
    return redirect('formateur/formations');}
    public function index(){
        $formations= formation::where('formateur_id',Auth::user()->formateur->id)->get();
        return view('formateur.salondesFormation',['formations'=>$formations]);
    }
     public function edit($id){
         $formation=formation::find($id);
         return view('formateur.edite',['formation'=>$formation]);

     }
   public function update(Request $request,$id){
         $formation=formation::find($id);
        $formation->intitule=$request->input('intitule');
        $formation->description=$request->input('description');
        session()->flash('success','la modification est enregistre!!!!');
 $formation->save();
 return redirect('formateur/formations');
     }
     public function destroy(Request $request,$id){
         $formation=formation::find($id);
         $formation->delete();
        return redirect('formateur/formations');}
        public function view($id){
            $formation=formation::find($id);
            $cours=cour::where('formation_id',$id)->get();
//dd($cours);
            return view('formateur.viewFormation',['formation'=>$formation,'cours'=>$cours]);

        }
        /////////////////////////admin
        public function indexAdmin()
        {
            $Formations=Formation::all();
            // dd( $formateurs );
             return view('admin.Formations',['Formations'=>$Formations]);
        }
        public function delete($id)
        {
            try {

                $Formation = formation::find($id);

                if (empty($Formation)) {
                    abort(404, "Ce Formation n'exist pas dans nos records");
                }
                $Formation->delete();
                return redirect('admin/Formations');

            } catch (HttpException $e) {
                return response()->json($e->getMessage(), $e->getStatusCode());
            }
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur;
use App\Models\User;
use App\Models\formation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\UploadedFile;
class FormateurController extends Controller
{
    public function index()
{
    return view("Formateur.index");
}
    public function profile()
    {
        $formateur=Formateur::find(Auth::user()->formateur->id);
        return view("formateur.profile",['formateur'=>$formateur]);
    }
public function indexAdmin()
{
    $formateurs =Formateur::all();
    // dd( $formateurs );
     return view('admin.fomateur',['formateurs'=>$formateurs]);
}

public function view($id)
{
    try {
        $formateur = Formateur::with(['user' => function ($query) {
            $query->select('id', 'name', 'email');
        }])->find($id);

        if (!$formateur) {

        }
        return view("Formateur.profile",["formateur"=>$formateur]) ;
    } catch (HttpException $e) {
        return response()->json($e->getMessage(), $e->getStatusCode());
    }

}
////////////////////////Apprenant
public function indexApprenant()

{
$formations=formation::where('formateur_id',Auth::user()->formateur->id)->get();
     return view("Formateur.apprenant.apprenant",['formations'=>$formations]);

}

///////////////////////Apprenant
    public function edit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:formateurs,id',
                'specialite' => 'required|string',
                'biography' => 'required|string|max:120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $formateur = Formateur::find($validated['id']);
            $formateur->specialite = $validated['specialite'];
            $formateur->biography = $validated['biography'];
            $formateur->save();

            return response()->json($formateur, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }

    }

    public function delete($id)
    {
        try {

            $formateur = Formateur::find($id);

            if (empty($formateur)) {
                abort(404, "Ce Formateur n'exist pas dans nos records");
            }
            $formateur->user->delete();
            $formateur->delete();

            return redirect('admin/fourmateurs');

        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
    public function updateprofile(Request $request)
    {


            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:formateurs,id',
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'specialite' => 'required|string',
                'biography' => 'required|string|max:120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

        $formateur = Formateur::find($validated['id']);
       $user=User::find($formateur->user_id);
       $user->name= $validated['name'];
       $user->email= $validated['email'];
        $formateur->name = $validated['name'];
            $formateur->specialite = $validated['specialite'];
            $formateur->biography =$validated['biography'];
            $formateur->save();
            $user->save();
return redirect('formateur/profile') ;
        }

        public function Editeprofile(Request $request)
        { $id=$request->input('id');
            $formateur=Formateur::find(Auth::user()->formateur->id);
            return view("formateur.Editeprofile",['id'=>$id,'formateur'=>$formateur]);
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
            return redirect('formateur/profile') ;
        }

}

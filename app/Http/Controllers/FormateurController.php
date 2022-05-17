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
            $formateur->delete();

            $formateur->user->delete();
            return redirect('admin/fourmateurs');

        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
    public function updateprofile(Request $request)
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

            return redirect('formateur/profile') ;
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }


    }


    public function Editeprofile()
    {
        return view("formateur.Editeprofile");
    }

}

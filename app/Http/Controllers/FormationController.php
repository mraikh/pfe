<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\Formateur;
use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        return response()->json($formations, 200);
    }

    public function view($id)
    {
        try {
            $formation = Formation::find($id);
            if (!$formation) {
                abort(404, "Cette formation n'exist pas dans nos records");
            }
            return response()->json($formation, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'intitule' => 'required|string',
                'formateur_id' => 'required|numeric|exists:formateurs,id',
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $formation = Formation::create($validated);

            return response()->json($formation, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function edit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:formations,id',
                'intitule' => 'required|string',
                'formateur_id' => 'required|numeric|exists:formateurs,id',
                'description' => 'required|string',
            ]);
            

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $formation = Formation::query()->find($validated['id']);
            $formation->intitule = $validated['intitule'];
            $formation->description = $validated['description'];
            $formation->formateur_id = $validated['formateur_id'];
            $formation->save();

            return response()->json($formation, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }

    }

    public function delete($id)
    {
        try {

            $formation = Formation::find($id);

            if (!$formation) {
                abort(404, "Cette formation n'exist pas dans nos records");
            }

            $formation->delete();

            array_merge($formation->toArray(), ['deleted' => true]);

            return response()->json(array_merge($formation->toArray(), ['deleted' => true]), 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
    
}

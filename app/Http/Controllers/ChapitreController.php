<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ChapitreController extends Controller
{
    public function index()
    {
        $chapitres = Chapitre::all();
        return response()->json($chapitres, 200);
    }

    public function view($id)
    {
        try {
            $chapitre = Chapitre::find($id);
            if (!$chapitre) {
                abort(404, "Cette chapitre n'exist pas dans nos records");
            }
            return response()->json($chapitre, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
    public function create()
    {
        return view('formateur.Chapter.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'intitule' => 'required|string',
                'description' => 'required|string',
                'file' => 'nullable|string',
                'quiz' => 'required|json',
                'cours_id' => 'required|numeric|exists:cours,id',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $chapitre = Chapitre::create($validated);

            return response()->json($chapitre, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function edit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:chapitres,id',
                'intitule' => 'required|string',
                'description' => 'required|string',
                'file' => 'nullable|string',
                'quiz' => 'required|json',
                'cours_id' => 'required|numeric|exists:cours,id',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $chapitre = Chapitre::query()->find($validated['id']);
            $chapitre->intitule = $validated['intitule'];
            $chapitre->description = $validated['description'];
            $chapitre->file = $validated['file'];
            $chapitre->quiz = $validated['quiz'];
            $chapitre->cours_id = $validated['cours_id'];
            $chapitre->save();

            return response()->json($chapitre, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }

    }

    public function delete($id)
    {
        try {

            $chapitre = Chapitre::find($id);

            if (!$chapitre) {
                abort(404, "Cette chapitre n'exist pas dans nos records");
            }

            $chapitre->delete();

            array_merge($chapitre->toArray(), ['deleted' => true]);

            return response()->json(array_merge($chapitre->toArray(), ['deleted' => true]), 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
}

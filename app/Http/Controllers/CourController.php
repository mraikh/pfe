<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CourController extends Controller
{

    public function index()
    {
        $courses = Cours::all();
        return response()->json($courses, 200);
    }

    public function view($id)
    {
        try {
            $cours = Cours::find($id);
            if (!$cours) {
                abort(404, "Ce cours n'exist pas dans nos records");
            }
            return response()->json($cours, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'intitule' => 'required|string',
                'formation_id' => 'required|numeric|exists:formations,id',
                'description' => 'required|string',
                'duree' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $cours = Cours::create($validated);

            return response()->json($cours, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function edit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:cours,id',
                'intitule' => 'required|string',
                'formation_id' => 'required|numeric|exists:formations,id',
                'description' => 'required|string',
                'duree' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $cours = Cours::query()->find($validated['id']);
            $cours->intitule = $validated['intitule'];
            $cours->description = $validated['description'];
            $cours->formation_id = $validated['formation_id'];
            $cours->duree = $validated['duree'];
            $cours->save();

            return response()->json($cours, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }

    }

    public function delete($id)
    {
        try {

            $cours = Cours::find($id);

            if (!$cours) {
                abort(404, "Ce cours n'exist pas dans nos records");
            }

            $cours->delete();

            array_merge($cours->toArray(), ['deleted' => true]);

            return response()->json(array_merge($cours->toArray(), ['deleted' => true]), 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApprenantController extends Controller
{
    public function index()
    {
        $query = Apprenant::query();

        if (request('formations')) {
            $query->with('formations');
        }
        $query->with(['user' => function ($query) {
            $query->select('id', 'name', 'email');
        }]);

        return response()->json($query->get(), 200);
    }

    public function view($id)
    {
        try {
            $apprenants = Apprenant::with(['user' => function ($query) {
                $query->select('id', 'name', 'email');
            }])->find($id);

            if (!$apprenants) {
                abort(404, "Ce Apprenant n'exist pas dans nos records");
            }
            return response()->json($apprenants, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'niveau_etu' => 'required|string',
                'ecole' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $user = User::create([
                'name' => $validated['name'],
                'password' => Hash::make($validated['password']),
                'email' => $validated['email'],
                'role_id' => 2,
            ]);

            $apprenant = Apprenant::create([
                'niveau_etu' => $validated['niveau_etu'],
                'ecole' => $validated['ecole'],
                'user_id' => $user->id,
            ]);

            return response()->json($apprenant, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function edit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric|exists:apprenants,id',
                'niveau_etu' => 'required|string',
                'ecole' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $apprenant = Apprenant::find($validated['id']);
            $apprenant->niveau_etu = $validated['niveau_etu'];
            $apprenant->ecole = $validated['ecole'];
            $apprenant->save();

            return response()->json($apprenant, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }

    }

    public function delete($id)
    {
        try {

            $apprenant = Apprenant::find($id);

            if (empty($apprenant)) {
                abort(404, "Ce Formateur n'exist pas dans nos records");
            }

            $apprenant->delete();
            $apprenant->user->delete();

            return response()->json($apprenant, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function inscrire(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apprenant_id' => 'required|numeric|exists:apprenants,id',
            'formation_id' => 'required|numeric|exists:formations,id',
        ]);

        $validated = $validator->validated();

        $apprenant = Apprenant::with('formations')->findOrFail($validated['apprenant_id']);

        if ($apprenant->formations()->where('formation_id', $validated['formation_id'])->count() == 0) {
            $apprenant->formations()->attach($validated['formation_id']);
        } else {
            return response()->json("already exists", 401);
        }

        return response()->json($apprenant, 200);
    }

    public function remove(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apprenant_id' => 'required|numeric|exists:apprenants,id',
            'formation_id' => 'required|numeric|exists:formations,id',
        ]);

        $validated = $validator->validated();

        $apprenant = Apprenant::findOrFail($validated['apprenant_id']);
        $apprenant->formations()->detach($validated['formation_id']);

        return response()->json($apprenant, 200);
    }
}

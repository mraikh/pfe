<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FormateurController extends Controller
{
    public function index()
    {
        $formateurs = Formateur::all();

        return response()->json($formateurs, 200);
        // return view("Formateur.index");
    }

    public function view($id)
    {
        try {
            $formateur = Formateur::find($id);
            if (empty($formateur)) {
                abort(404, "Ce Formateur n'exist pas dans nos records");
            }
            return response()->json($formateur, 200);
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
                'specialite' => 'required|string',
                'biography' => 'required|string|max:120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 401);
            }

            $validated = $validator->validated();

            $user = User::create([
                'name' => $validated['name'],
                'password' => Hash::make($validated['password']),
                'email' => $validated['email'],
                'role_id' => 1,
            ]);

            $formateur = Formateur::create([
                'specialite' => $validated['specialite'],
                'biography' => $validated['biography'],
                'user_id' => $user->id,
            ]);

            return response()->json($formateur, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

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

            return response()->json($formateur, 200);
        } catch (HttpException $e) {
            return response()->json($e->getMessage(), $e->getStatusCode());
        }
    }

    public function profile()
    {
        return view("Formateur.profile");
    }

}

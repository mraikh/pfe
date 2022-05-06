<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Apprenant;
use App\Models\Formateur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'numeric', 'exists:roles,id'],
            'specialite'=>'sometimes|string',
            'biography'=>'sometimes|string',
            'niveau_etu'=>'sometimes|string',
            'ecole'=>'sometimes|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        if($request->role == 1){
            Formateur::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'specialite'=>$request->specialite,
                'biography'=>$request->biography
            ]);
        }else if($request->role == 2){
            Apprenant::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'niveau_etu'=>$request->niveau,
                'ecole'=>$request->ecole
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

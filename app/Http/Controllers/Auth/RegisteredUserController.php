<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'ecommerce' => ['string', 'max:255'],
            'type' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:4', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'boutique' => $request->boutique,
            'site' => $request->site,
            'ecommerce' => $request->ecommerce,
            'type' => $request->type,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);
        if($request->email == "")
        {
            $user->attachRole('client');
        }
        else
        {
            $user->attachRole('commercant');
        }
        
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}

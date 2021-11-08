<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\enregistrercommande;
use App\Models\demandefinancement;
use App\Models\aide;
use App\Models\versement;
use App\Models\user;

class AdminController extends Controller
{
    public function pageclientad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeclient=user::get();
        return view('admin.client',compact('listeclient','listeversement','listecommande'));
    }
    public function pagepartenairead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listepartenaire=user::get();
        return view('admin.partenaire',compact('listepartenaire','listeversement','listecommande'));
    }
    public function pagecommercantad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecommercant=user::get();
        return view('admin.commercant',compact('listecommercant','listeversement','listecommande'));
    }
    public function pageaidead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeaide=aide::get();
        return view('admin.aide',compact('listeaide','listeversement','listecommande'));
    }
    public function pagefinancementad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listefinancement=demandefinancement::get();
        return view('admin.financement',compact('listefinancement','listeversement','listecommande'));
    }
    public function pageversementad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.versement',compact('listeversement','listecommande'));
    }
    public function pagecommandead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.commande',compact('listeversement','listecommande'));
    }

    public function creerclientad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.creerclient',compact('listeversement','listecommande'));
    }

    public function creationclientad(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);
            $user->attachRole('client');
        event(new Registered($user));
        return redirect()->back()->with("succescreate","Le client a été bien creer");
    }

    public function creerpartenairead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.creerpartenaire',compact('listeversement','listecommande'));
    }

    public function creationpartenairead(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'ecommerce' => ['string', 'max:255'],
            'type' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
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
            $user->attachRole('partenaire');
        event(new Registered($user));
        return redirect()->back()->with("succescreate","Le partenaire a été bien creer");
    }

    public function creercommercantad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.creercommercant',compact('listeversement','listecommande'));
    }

    public function creationcommercantad(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'type' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'boutique' => $request->boutique,
            'site' => $request->site,
            'type' => $request->type,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);
            $user->attachRole('commercant');
        event(new Registered($user));
        return redirect()->back()->with("succescreate","Le commercant a été bien creer");
    }

    public function modifieradminad()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.profiladmin',compact('listeversement','listecommande'));
    }

    public function updateadminad( Request $Request )
    {
        $Request->validate([
        'ancien_code_pin' => 'required|min:4|max:8',
        'nouveau_code_pin' => 'required|min:4|max:8',
        'confirmation_code_pin' => 'required|same:nouveau_code_pin'
        ]);


        $current_user=auth()->user();
        if(Hash::check($Request->ancien_code_pin,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($Request->nouveau_code_pin)
            ]);
            return redirect()->back()->with("succescreate","Votre mot de passe a été modifié");
 
        }
        else{
            return redirect()->back()->with("noncreate","Vous avez entré un mauvais mot de passe");
        }
    }



























    ////////////// supprimer client//////////////////////////////////////////

    public function supprimerclient(user $suppclient)
	{
        $nomcomplet=$suppclient->nom." ".$suppclient->prenom;
        $suppclient->delete();
        return back()->with("successDelete","Le client $nomcomplet est supprimer avec succee");
	}
////////////// page editer client//////////////////////////////////////////

    public function editclient(user $client)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.editerclient', compact('client','listecommande','listeversement'));
    }
////////////// MAJ client//////////////////////////////////////////

    public function updateclient(Request $request, user $userclient)
    {
        $request->validate ( 
        [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],
        ]);

        $userclient->update(
        [
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return back()->with("updatereussit","Mise a jour reussit!");
    }

////////////// supprimer partenaire//////////////////////////////////////////

public function supprimerpartenaire(user $supppartenaire)
{
    $nomcomplet=$supppartenaire->nom." ".$supppartenaire->prenom;
    $supppartenaire->delete();
    return back()->with("successDelete","Le partenaire $nomcomplet est supprimer avec succee");
}
////////////// Page editer partenaire//////////////////////////////////////////
    

    public function editpartenaire(user $partenaire)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.editerpartenaire', compact('partenaire','listecommande','listeversement'));
    }
////////////// MAJ partenaire//////////////////////////////////////////

    public function updatepartenaire(Request $request, user $userpartenaire)
    {
        $request->validate ( 
        [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['required', 'string','max:255'],
            'site' => ['required', 'string','max:255'],
            'ecommerce' => ['required', 'string','max:255'],
            'email' => ['required', 'email','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],
        ]);

        $userpartenaire->update(
        [
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'boutique' => $request->boutique,
            'site' => $request->site,
            'ecommerce' => $request->ecommerce,
            'email' => $request->email,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return back()->with("updatereussit","Mise a jour reussit!");
    }

    
////////////// supprimer commercant//////////////////////////////////////////

    public function supprimercommercant(user $suppcommercant)
    {
        $nomcomplet=$suppcommercant->nom." ".$suppcommercant->prenom;
        $suppcommercant->delete();
        return back()->with("successDelete","Le commercant $nomcomplet est supprimer avec succee");
    }
////////////// Page editer commercant//////////////////////////////////////////
    

    public function editcommercant(user $commercant)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editercommercant', compact('commercant','listecommande','listeversement'));
    }
////////////// MAJ commercant//////////////////////////////////////////

    public function updatecommercant(Request $request, user $usercommercant)
    {
        $request->validate ( 
        [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['required', 'string','max:255'],
            'adresse' => ['required', 'string','max:255'],
            'email' => ['required', 'email','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],
        ]);

        $usercommercant->update(
        [
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'boutique' => $request->boutique,
            'adresse' => $request->site,
            'email' => $request->email,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return back()->with("updatereussit","Mise a jour reussit!");
    }

}
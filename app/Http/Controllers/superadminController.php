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

class superadminController extends Controller
{
    public function pageadmin()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeadmin=user::get();
        return view('superadmin.admin',compact('listeadmin','listeversement','listecommande'));
    }
    public function test()
    {
        return view('superadmin.test');
    }
    public function pageclient()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeclient=user::get();
        return view('superadmin.client',compact('listeclient','listeversement','listecommande'));
    }
    public function pagepartenaire()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listepartenaire=user::get();
        return view('superadmin.partenaire',compact('listepartenaire','listeversement','listecommande'));
    }
    public function pagecommercant()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecommercant=user::get();
        return view('superadmin.commercant',compact('listecommercant','listeversement','listecommande'));
    }
    public function pageaide()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeaide=aide::get();
        return view('superadmin.aide',compact('listeaide','listeversement','listecommande'));
    }
    public function pagefinancement()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listefinancement=demandefinancement::get();
        return view('superadmin.financement',compact('listefinancement','listeversement','listecommande'));
    }
    public function pageversement()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.versement',compact('listeversement','listecommande'));
    }
    public function pagecommande()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.commande',compact('listeversement','listecommande'));
    }

    public function creeradmin()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.creeradmin',compact('listeversement','listecommande'));
    }
//////////////creation admin//////////////////////////////////////////
    public function creationadmin(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);
            $user->attachRole('admin');
        event(new Registered($user));
        return redirect()->back()->with("succescreate","L'administrateur a été bien creer");
    }
//////////////creation client//////////////////////////////////////////

    public function creerclient()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.creerclient',compact('listeversement','listecommande'));
    }

    public function creationclient(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed','integer','min:4', 'max:9999', Rules\Password::defaults()],
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
//////////////creation partenaire//////////////////////////////////////////

    public function creerpartenaire()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.creerpartenaire',compact('listeversement','listecommande'));
    }

    public function creationpartenaire(Request $request)
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
            'password' => ['required', 'confirmed','min:4', 'max:4', Rules\Password::defaults()],
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
//////////////creation commercant//////////////////////////////////////////

    public function creercommercant()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.creercommercant',compact('listeversement','listecommande'));
    }

    public function creationcommercant(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'type' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'confirmed','min:4', 'max:4', Rules\Password::defaults()],
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

////////////// modifier page mdp super admin//////////////////////////////////////////

    public function modifiersuperadmin()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.profilsuperadmin',compact('listeversement','listecommande'));
    }
////////////// modifier mdp super admin//////////////////////////////////////////

    public function updatesuperadmin( Request $Request )
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

////////////// supprimer admin//////////////////////////////////////////

    public function supprimeradmin(user $suppadmin)
	{
        $nomcomplet=$suppadmin->nom." ".$suppadmin->prenom;
        $suppadmin->delete();
        return back()->with("successDelete","L'administrateur $nomcomplet est supprimer avec succee");
	}
////////////// page editer admin//////////////////////////////////////////

    public function editadmin(user $admin)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editeradmin', compact('admin','listecommande','listeversement'));
    }
////////////// MAJ admin//////////////////////////////////////////

    public function supdateadmin(Request $request, user $useradmin)
    {
        $request->validate ( 
        [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],
        ]);

        $useradmin->update(
        [
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'type' => $request->type,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        return back()->with("updatereussit","Mise a jour reussit!");
    }
////////////// supprimer client//////////////////////////////////////////

    public function ssupprimerclient(user $ssuppclient)
	{
        $nomcomplet=$ssuppclient->nom." ".$ssuppclient->prenom;
        $ssuppclient->delete();
        return back()->with("successDelete","Le client $nomcomplet est supprimer avec succee");
	}
////////////// page editer client//////////////////////////////////////////

    public function seditclient(user $sclient)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editerclient', compact('sclient','listecommande','listeversement'));
    }
////////////// MAJ client//////////////////////////////////////////

    public function supdateclient(Request $request, user $suserclient)
    {
        $request->validate ( 
        [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'type' => ['required', 'string','max:255'],
            'telephone' => ['required', 'integer'],            
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],
        ]);

        $suserclient->update(
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

public function ssupprimerpartenaire(user $ssupppartenaire)
{
    $nomcomplet=$ssupppartenaire->nom." ".$ssupppartenaire->prenom;
    $ssupppartenaire->delete();
    return back()->with("successDelete","Le partenaire $nomcomplet est supprimer avec succee");
}
////////////// Page editer partenaire//////////////////////////////////////////
    

    public function seditpartenaire(user $spartenaire)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editerpartenaire', compact('spartenaire','listecommande','listeversement'));
    }
////////////// MAJ partenaire//////////////////////////////////////////

    public function supdatepartenaire(Request $request, user $suserpartenaire)
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

        $suserpartenaire->update(
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

public function ssupprimercommercant(user $ssuppcommercant)
{
    $nomcomplet=$ssuppcommercant->nom." ".$ssuppcommercant->prenom;
    $ssuppcommercant->delete();
    return back()->with("successDelete","Le commercant $nomcomplet est supprimer avec succee");
}
////////////// Page editer commercant//////////////////////////////////////////
    

    public function seditcommercant(user $scommercant)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editercommercant', compact('scommercant','listecommande','listeversement'));
    }
////////////// MAJ commercant//////////////////////////////////////////

    public function supdatecommercant(Request $request, user $susercommercant)
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

        $susercommercant->update(
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
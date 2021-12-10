<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\enregistrercommande;
use App\Models\demandefinancement;
use App\Models\aide;
use App\Models\versement; 
use App\Models\user;
use App\Models\categorie;

class superadminController extends Controller
{
    public function pageadmin()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listeadmin=user::get();
        return view('superadmin.admin',compact('listeadmin','listeversement','listecommande'));
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
    public function pagecategorie()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecategorie=categorie::get();
        return view('superadmin.categorie',compact('listeversement','listecommande','listecategorie'));
    }

    public function creercategorie()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.creercategorie',compact('listeversement','listecommande'));
    }
    public function creationcategorie(Request $Request)
    {
        $Request->validate([
            'icon' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($Request->hasfile('icon'))
            {
                $file = $Request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $icon = time().'.'.$extension;
                $file->move('icon/',$icon );
                categorie::create(	
                [
                    "libelle"=>$Request->libelle,
                    'icon' => $icon,
                    "description"=>$Request->description
                ]);
            }
        return back()->with("succescreate","La categorie est bien enregistré!!");
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', 'min:4', 'max:4', Rules\Password::defaults()],

        ]);
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = time().'.'.$extension;
                $file->move('logo/',$image );
            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'type' => $request->type,
                'valide' => 1,
                'image' => $image,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
            ]);
                $user->attachRole('admin');
            event(new Registered($user));
            }
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
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed','integer','min:4', 'max:9999', Rules\Password::defaults()],
        ]);
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = time().'.'.$extension;
                $file->move('logo/',$image );

            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'telephone' => $request->telephone,
                'type' => $request->type,
                'image' => $image,
                'password' => Hash::make($request->password),
            ]);
                $user->attachRole('client');
            event(new Registered($user));
            }
        return redirect()->back()->with("succescreate","Le client a été bien creer");
    }
//////////////creation partenaire//////////////////////////////////////////

    public function creerpartenaire()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecategorie=categorie::get();
        return view('superadmin.creerpartenaire',compact('listeversement','listecommande','listecategorie'));
    }

    public function creationpartenaire(Request $request)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'type' => ['string', 'max:255'],
            'image' => ['required'],
            'commentaire' => ['required'],
            'categorie' => ['required'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed','min:4', 'max:4', Rules\Password::defaults()],
        ]);
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = time().'.'.$extension;
                $file->move('logo/',$image );
            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'boutique' => $request->boutique,
                'site' => $request->site,
                'type' => $request->type,
                'email' => $request->email,
                'commentaire' => $request->commentaire,
                'categorie' => $request->id_categorie, 
                'telephone' => $request->telephone,
                'image'=> $image,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('partenaire');
            event(new Registered($user));
        }
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
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed','min:4', 'max:4', Rules\Password::defaults()],
        ]);
        if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = time().'.'.$extension;
                $file->move('logo/',$image );
            
            $user = User::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'boutique' => $request->boutique,
                'site' => $request->site,
                'type' => $request->type,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'image'=> $image,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('commercant');
            event(new Registered($user));
        }
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




    ////////////// supprimer categorie//////////////////////////////////////////

    public function ssupprimercategorie(categorie $ssuppcategorie)
	{
        $libelle=$ssuppcategorie->libelle;
        $ssuppcategorie->delete();
        return back()->with("successDelete","La categorie $libelle est supprimer avec succee");
	}
////////////// page editer categorie//////////////////////////////////////////

    public function seditcategorie(categorie $scategorie)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('superadmin.editercategorie', compact('scategorie','listecommande','listeversement'));
    }
////////////// MAJ categorie//////////////////////////////////////////

    public function supdatecategorie(Request $request, categorie $scategorie)
    {
        if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $icon = time().'.'.$extension;
            $file->move('icon/',$icon );
            $scategorie->update(
                [
                    'libelle' => $request->libelle,
                    'icon' => $icon,
                    'description' => $request->description
                ]);
        }

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

    ////////////// Activer/desactiver admin//////////////////////////////////////////

    public function activeradmin(Request $request, user $activeradmin)
    {
        $nom=$activeradmin->nom." ".$activeradmin->prenom;
        $activeradmin->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","L'administrateur $nom a été activer avec success!");
    }

    public function desactiveradmin(Request $request, user $desactiveradmin)
    {
        $nom=$desactiveradmin->nom." ".$desactiveradmin->prenom;
        $desactiveradmin->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","L'administrateur $nom a été désactiver avec success!");
    }

    ////////////// Activer/desactiver commercant//////////////////////////////////////////

    public function sactivercommercant(Request $request, user $sactivercommercant)
    {
        $nom=$sactivercommercant->nom." ".$sactivercommercant->prenom;
        $sactivercommercant->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le commercant $nom a été activer avec success!");
    }

    public function sdesactivecommercant(Request $request, user $sdesactivecommercant)
    {
        $nom=$sdesactivecommercant->nom." ".$sdesactivecommercant->prenom;
        $sdesactivecommercant->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le commercant $nom a été désactiver avec success!");
    }

    ////////////// Activer/desactiver partenaire//////////////////////////////////////////

    public function sactiverpartenaire(Request $request, user $sactiverpartenaire)
    {
        $nom=$sactiverpartenaire->nom." ".$sactiverpartenaire->prenom;
        $sactiverpartenaire->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le partenaire $nom a été activer avec success!");
    }

    public function sdesactivepartenaire(Request $request, user $sdesactivepartenaire)
    {
        $nom=$sdesactivepartenaire->nom." ".$sdesactivepartenaire->prenom;
        $sdesactivepartenaire->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le partenaire $nom a été désactiver avec success!");
    }

    ////////////// Activer/desactiver client//////////////////////////////////////////

    public function sactiverclient(Request $request, user $sactiverclient)
    {
        $nom=$sactiverclient->nom." ".$sactiverclient->prenom;
        $sactiverclient->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le client $nom a été activer avec success!");
    }

    public function sdesactiveclient(Request $request, user $sdesactiveclient)
    {
        $nom=$sdesactiveclient->nom." ".$sdesactiveclient->prenom;
        $sdesactiveclient->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le client $nom a été désactiver avec success!");
    }
}
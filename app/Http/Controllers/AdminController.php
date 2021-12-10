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
use App\Models\categorie;

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
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
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
            'image'=> $image,
            'password' => Hash::make($request->password),
        ]);
            $user->attachRole('client');
            event(new Registered($user));
        }
        return redirect()->back()->with("succescreate","Le client a été bien creer");
    }

    public function creerpartenairead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecategorie=categorie::get();
        $listepartenaire=user::get();
        return view('admin.creerpartenaire',compact('listeversement','listecommande','listecategorie','listepartenaire'));
    }

    public function creationpartenairead(Request $request)
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
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
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
                'commentaire' => $request->commentaire,
                'type' => $request->type,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'categorie' => $request->id_categorie, 
                'image'=> $image,
                'password' => Hash::make($request->password),
            ]);
                $user->attachRole('partenaire');
            event(new Registered($user));
            }
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nom' => ['required', 'string','max:255'],
            'boutique' => ['max:255'],
            'site' => ['max:255'],
            'type' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', 'max:9999', Rules\Password::defaults()],
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

    ////////////// Activer/desactiver commercant//////////////////////////////////////////

    public function activercommercant(Request $request, user $activercommercant)
    {
        $nom=$activercommercant->nom." ".$activercommercant->prenom;
        $activercommercant->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le commercant $nom a été activer avec success!");
    }

    public function desactivecommercant(Request $request, user $desactivecommercant)
    {
        $nom=$desactivecommercant->nom." ".$desactivecommercant->prenom;
        $desactivecommercant->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le commercant $nom a été désactiver avec success!");
    }

    ////////////// Activer/desactiver partenaire//////////////////////////////////////////

    public function activerpartenaire(Request $request, user $activerpartenaire)
    {
        $nom=$activerpartenaire->nom." ".$activerpartenaire->prenom;
        $activerpartenaire->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le partenaire $nom a été activer avec success!");
    }

    public function desactivepartenaire(Request $request, user $desactivepartenaire)
    {
        $nom=$desactivepartenaire->nom." ".$desactivepartenaire->prenom;
        $desactivepartenaire->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le partenaire $nom a été désactiver avec success!");
    }

    ////////////// Activer/desactiver client//////////////////////////////////////////

    public function activerclient(Request $request, user $activerclient)
    {
        $nom=$activerclient->nom." ".$activerclient->prenom;
        $activerclient->update(
        [
            'valide' => 1
        ]);
        return back()->with("accessActiver","Le client $nom a été activer avec success!");
    }

    public function desactiveclient(Request $request, user $desactiveclient)
    {
        $nom=$desactiveclient->nom." ".$desactiveclient->prenom;
        $desactiveclient->update(
        [
            'valide' => 0
        ]);
        return back()->with("accessDesactiver","Le client $nom a été désactiver avec success!");
    }
    public function pagecategoriead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        $listecategorie=categorie::get();
        return view('admin.categorie',compact('listeversement','listecommande','listecategorie'));
    }
    public function creercategoriead()
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.creercategorie',compact('listeversement','listecommande'));
    }
    public function creationcategoriead(Request $Request)
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
    ////////////// supprimer categorie//////////////////////////////////////////

    public function supprimercategorie(categorie $suppcategorie)
	{
        $libelle=$suppcategorie->libelle;
        $suppcategorie->delete();
        return back()->with("successDelete","La categorie $libelle est supprimer avec succee");
	}
    ////////////// page editer categorie//////////////////////////////////////////

    public function editcategorie(categorie $categorie)
    {
        $listecommande=enregistrercommande::get();
        $listeversement=versement::get();
        return view('admin.editercategorie', compact('categorie','listecommande','listeversement'));
    }
    ////////////// MAJ categorie//////////////////////////////////////////

    public function updatecategorie(Request $request, categorie $categorie)
    {
        $Request->validate([
        'icon' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $icon = time().'.'.$extension;
            $file->move('icon/',$icon );
            $categorie->update(
                [
                    'libelle' => $request->libelle,
                    'icon' => $icon,
                    'description' => $request->description
                ]);
        }

        return back()->with("updatereussit","Mise a jour reussit!");
    }
}
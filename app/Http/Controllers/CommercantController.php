<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\enregistrercommande;
use App\Models\aide;
use App\Models\versement;
use App\Models\user;
use App\Models\paydounya;
use Hash;

class CommercantController extends Controller
{
    
    public function enregistrercommande()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        $listeclient=user::get();
        return view('commercant.enregistrercommande',compact('listecommandesclient','listeversement','listeclient'));
    }

    public function creercommande(Request $Request)
    {
        enregistrercommande::create(	
            [
                "nomproduit"=>$Request->nomproduit,
                "prix"=>$Request->prix,
                "montantverset"=>$Request->montantverset,
                "adresselivraison"=>$Request->adresselivraison,
                "nomclient"=>$Request->nomclient,
                "client_id"=>$Request->client_id,
                "delaipaye"=>$Request->delaipaye,
                "montantpayer"=>$Request->montantpayer,
                "user_id"=>Auth::user()->id
            ]);
        return back()->with("succescreate","Votre commande a ete bien enregistrer");
    }
    public function aide()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('commercant.aide',compact('listecommandesclient','listeversement'));
    }
    public function formaide(Request $Request)
    {
        aide::create(	
        [
            "sujet"=>$Request->sujet,
            "message"=>$Request->message,
            "user_id"=>Auth::user()->id
        ]);
        
        return back()->with("succescreate","Votre demande a ete bien prie en charge");
    }

    public function listecommande()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        $listeclient=user::get();
        return view('commercant.listecommande',compact('listecommandesclient','listeversement','listeclient'));
    }
    

    public function modifiermdpc()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('commercant.profilc',compact('listecommandesclient','listeversement'));
    }

    public function updatemdpc( Request $Request )
    {
        $Request->validate([
        'ancien_mot_de_passe' => 'required|min:4|max:4',
        'nouveau_mot_de_passe' => 'required|min:4|max:4',
        'confirmation_mot_de_passe' => 'required|same:nouveau_mot_de_passe'
        ]);


        $current_user=auth()->user();
        if(Hash::check($Request->ancien_mot_de_passe,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($Request->nouveau_mot_de_passe)
            ]);
            return redirect()->back()->with("succescreate","Votre mot de passe a ??t?? modifi??");

        }
        else{
            return redirect()->back()->with("noncreate","Vous avez entr?? un mauvais mot de passe");
        }
    }

    public function listeproduit ()
    {
        return view('paydounya.index');
    }
    public function ajoutproduit(Request $Request)
    {
        return view('paydounya.index');
    }

}
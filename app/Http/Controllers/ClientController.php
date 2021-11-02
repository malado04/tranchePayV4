<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Demandefinancement;
use App\Models\enregistrercommande;
use App\Models\versement;
use App\Models\aide;
use Hash;

class ClientController extends Controller
{

    public function mescommandes()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.mescommandes',compact('listecommandesclient','listeversement'));
    }

    public function demandefinancement()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.demandefinancement',compact('listecommandesclient','listeversement'));
    }

    public function effectuerversement(enregistrercommande $enregistrercommande)
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.effectuerversement',compact('enregistrercommande','listecommandesclient','listeversement'));
    }

    public function listeversement()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.listeversement',compact('listecommandesclient','listeversement'));
    }

    public function modifiermdp()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.profil',compact('listecommandesclient','listeversement'));
    }
    public function updatemdp( Request $Request )
    {
        $Request->validate([
        'old_password' => 'required|min:4|max:4',
        'new_password' => 'required|min:4|max:4',
        'confirm_password' => 'required|same:new_password'
        ]);


        $current_user=auth()->user();
        if(Hash::check($Request->old_password,$current_user->password)){
            $current_user->update([
                'password'=>bcrypt($Request->new_password)
            ]);
            return redirect()->back()->with("succescreate","Votre mot de passe a été modifié");

        }
        else{
            return redirect()->back()->with("noncreate","Vous avez entré un mauvais mot de passe");
        }
    }

    public function aide()
    {
        $listecommandesclient=enregistrercommande::get();
        $listeversement=versement::get();
        return view('client.aide',compact('listecommandesclient','listeversement'));
    }

    public function creerfinancement(Request $Request)
    {
        demandefinancement::create(	
        [
            "nomboutique"=>$Request->nomboutique,
            "nomproduit"=>$Request->nomproduit,
            "lienproduit"=>$Request->lienproduit,
            "adresseboutique"=>$Request->adresseboutique,
            "adresselivraison"=>$Request->adresselivraison,
            "montantverset"=>$Request->montantverset,
            "nombremois"=>$Request->nombremois,
            "prix"=>$Request->prix,
            "montantpayer"=>$Request->montantpayer,
            "user_id"=>Auth::user()->id
        ]);
        
        return back()->with("succescreate","Votre demande a ete bien prie en charge");
    }

    public function versement(Request $Request)
    {
        versement::create(	
        [
            "verset"=>$Request->verset,
            "enregistrercommande_id"=>$Request->enregistrercommande_id,
            "user_id"=>Auth::user()->id
        ]);
        
        return back()->with("succescreate","Votre versement a ete enregistrer");
    }

    
    public function formaideclient(Request $Request)
    {
        aide::create(	
        [
            "sujet"=>$Request->sujet,
            "message"=>$Request->message,
            "user_id"=>Auth::user()->id
        ]);
        
        return back()->with("succescreate","Votre demande a ete bien prie en charge");
    }
    
}

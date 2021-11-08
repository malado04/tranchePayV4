<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\enregistrercommande;
use App\Models\versement;
use App\Models\user;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->HasRole('client') && Auth::user()->valide==1)
        {
            $listecommandesclient=enregistrercommande::get();
            $listeversement=versement::get();
            $listeboutique=user::get();
            return view('client.index',compact('listecommandesclient','listeversement','listeboutique'));
        }
        elseif (Auth::user()->HasRole('commercant') && Auth::user()->valide==1) {
            $listecommandesclient=enregistrercommande::get();
            $listeversement=versement::get();
            return view('commercant.index',compact('listecommandesclient','listeversement'));
        }
        elseif (Auth::user()->HasRole('superadmin') && Auth::user()->valide==1) {
            $listeversement=versement::get();
            $listecommande=enregistrercommande::get();
            return view('superadmin.index',compact('listecommande','listeversement'));
        }
        elseif (Auth::user()->HasRole('admin') && Auth::user()->valide==1) {
            $listeversement=versement::get();
            $listecommande=enregistrercommande::get();
            return view('admin.index',compact('listecommande','listeversement'));
        }
        elseif (Auth::user()->HasRole('partenaire') && Auth::user()->valide==1) {
            return view('partenaire.index');
        }
        
    }
}

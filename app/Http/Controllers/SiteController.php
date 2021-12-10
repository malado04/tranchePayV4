<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function documentation()
    {
        return view('site.documentation');
    }
    public function commercant()
    {
        return view('site.commercant');
    }
    public function particulier()
    {
        return view('site.particulier');
    }
    public function contact()
    {
        return view('site.contact');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\demandefinancement;
use Illuminate\Http\Request;

class FinancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return demandefinancement::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        demandefinancement::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(demandefinancement $demandefinancement)
    {
        return $demandefinancement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demandefinancement $demandefinancement)
    {
        $demandefinancement->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(demandefinancement $demandefinancement)
    {
        $demandefinancement->delete();
    }
}

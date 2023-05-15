<?php

namespace App\Http\Controllers;

use App\Models\Savininkai;
use Illuminate\Http\Request;

class SavininkaiAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Savininkai::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $savininkais=new Savininkai();
        $savininkais->id=$request->id;
        $savininkais->vardas=$request->vardas;
        $savininkais->pavarde=$request->pavarde;
        $savininkais->save();

        return $savininkais;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Savininkai::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $savininkais= Savininkai::find($id);
        $savininkais->id=$request->id;
        $savininkais->vardas=$request->vardas;
        $savininkais->pavarde=$request->pavarde;
        $savininkais->save();

        return $savininkais;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Savininkai::destroy($id);
       return true;
    }
}

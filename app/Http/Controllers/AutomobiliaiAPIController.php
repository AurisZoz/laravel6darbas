<?php

namespace App\Http\Controllers;

use App\Models\Automobiliai;
use Illuminate\Http\Request;

class AutomobiliaiAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Automobiliai::all();
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
        $automobiliai=new Automobiliai();
        $automobiliai->id=$request->id;
        $automobiliai->marke=$request->marke;
        $automobiliai->modelis=$request->modelis;
        $automobiliai->numeris=$request->numeris;
        $automobiliai->save();

        return $automobiliai;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Automobiliai::find($id);
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
        $automobiliai= Automobiliai::find($id);
        $automobiliai->id=$request->id;
        $automobiliai->marke=$request->marke;
        $automobiliai->modelis=$request->modelis;
        $automobiliai->numeris=$request->numeris;
        $automobiliai->save();

        return $automobiliai;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Automobiliai::destroy($id);
       return true;
    }
}

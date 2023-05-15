<?php

namespace App\Http\Controllers;

use App\Models\Automobiliai;
use App\Models\Savininkai;
use Illuminate\Http\Request;
use App\Http\Requests\AutomobiliaiRequest;

class AutomobiliaiController extends Controller
{

    public function index(Request $request)
    { 
        $filter=$request->session()->get('filterAutomobiliai', (object)['marke'=>null,'modelis'=>null,'numeris'=>null]);

        $automobiliais=Automobiliai::with(['savininkai'])->filter($filter)->orderBy("marke")->get();

     $data=Savininkai::all();

     return view("automobiliais.index",[
     "automobiliais"=>Automobiliai::with('savininkai')->get(),
     "filter"=>$filter,
     "data"=>$data
     
     ]);
    }

   public function create()
   {
    return view("automobiliais.create");
   }

   public function store(AutomobiliaiRequest $request)
   {
    $automobiliai=new Automobiliai();
    $automobiliai->id=$request->id;
    $automobiliai->marke=$request->marke;
    $automobiliai->modelis=$request->modelis;
    $automobiliai->numeris=$request->numeris;
  

    $automobiliai->save();
    return redirect()->route('automobiliais.index');

   }

   public function show(Automobiliai $automobiliai)
   {
     return view('automobiliais.show', compact('automobiliai'));

    // $automobiliai=Automobiliai::all();
    //  return view('automobiliais', ['marke'=>$automobiliai, 'modelis'=>$automobiliai, 'numeris'=>$automobiliai]);

   }

   public function edit(Automobiliai $automobiliai)    
   {
    return view("automobiliais.edit",[
        "automobiliai"=>$automobiliai
      
    ]);
   }

   public function update(AutomobiliaiRequest $request, Automobiliai $automobiliai)
   {

    $automobiliai->id=$request->id;
    $automobiliai->marke=$request->marke;
    $automobiliai->modelis=$request->modelis;
    $automobiliai->numeris=$request->numeris;

    if ($request->file("image")!=null){
      if ($automobiliai->image!=null){
          unlink(storage_path()."/app/public/automobiliais/".$automobiliai->image);
      }

      $request->file("image")->store("/public/automobiliais");
      $automobiliai->image=$request->file("image")->hashName();
  }

    $automobiliai->save();
    return redirect()->route('automobiliais.index');

   }

   public function destroy(Automobiliai $automobiliai)
   {

    $automobiliai->delete();
    return redirect()->route('automobiliais.index');
   }

   public function search(Request $request)
   {
     $filterAutomobiliai=new \stdClass();
     $filterAutomobiliai->id=$request->id;
     $filterAutomobiliai->marke=$request->marke;
     $filterAutomobiliai->modelis=$request->modelis;
     $filterAutomobiliai->numeris=$request->numeris;
 
     $request->session()->put('filterAutomobiliai', $filterAutomobiliai);
     return redirect()->route('automobiliais.index');
 
   }

}
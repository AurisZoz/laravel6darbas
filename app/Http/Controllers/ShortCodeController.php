<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function index(Request $request){
    
        return view("shortcode.index",[
            "shortcode"=>$shortcode

        ]);
    }

    public function save(Request $request)
    {
      $codes=new ShortCode();
      $codes->autonumber=$request->autonumber;
      $codes->shortcode=$request->shortcode;
      $codes->replace=$request->replace;
      $codes->save();
      return redirect()->route("shortcode.index");
  
    }

    public function edit($id)
    {
     return view("shortcode.edit",[
      "codes"=>ShortCode::find($id)
     ]);
    }

    public function update($id, Request $request)
    {
        $codes=new ShortCode();
        $codes->autonumber=$request->autonumber;
        $codes->shortcode=$request->shortcode;
        $codes->replace=$request->replace;
        $codes->save();
        return redirect()->route("shortcode.index");
    }

    public function delete($id){
        ShortCode::destroy($id);
        return redirect()->route("shortcode.index");
      }
}

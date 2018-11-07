<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;

class AttributeController extends Controller
{
    public function api_get_attributes(){
        return Attribute::all();
    }

    public function store(Request $request){
        $attr = new Attribute();
        $attr->name = $request->name;
        $attr->save();
        $message = "Attribute created successfully";
        return redirect("/home#/attributes");
    }

    public function edit($id){
        $attribute = Attribute::find($id);
        return view('attribute.edit')->with(compact('attribute'));
    }

    public function update($id, Request $request){
        $attribute = Attribute::find($id);
        $attribute->name = $request->name;

        $attribute->save();

        return redirect('/home#/attributes')->with([
            'successMsg' => 'Attribute successfully updated'
        ]);
    }

    public function destroy($id){
        $attribute = Attribute::find($id);
        $attribute->delete();

        return redirect('/home#/attributes')->with([
            'successMsg' => 'Attribute successfully deleted'
        ]);
    }
}

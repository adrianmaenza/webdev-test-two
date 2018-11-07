<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function edit($id){
        $user = User::find($id);
        $attr = \App\Attribute::all();
        return view('user.edit')->with(compact('user', 'attr'));
    }

    public function update($id, Request $request){
        $user = User::find($id);
        $attributes = \App\Attribute::all();
        $items = [];

        $user->first_name = $request->first_name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;

        // look for attributes and save them
        foreach($attributes as $attribute){
            $form_name = strtolower($attribute->name);
            $form_name = str_replace(" ", "_", $form_name);
            $items[$attribute->id] = [
                'value' => $request->$form_name
            ];
        }
        
        $sync = $user->attributes()->sync($items);

        $user->save();

        return redirect('/home')->with([
            'successMsg' => 'User account updated'
        ]);
    }

    public function api_get_users(){
        $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);

        if($sort){
            $users = \App\User::with('attributes')->orderBy($sort, 'asc')->get();
        } else{
            $users = \App\User::with('attributes')->get();
        }
        return $users;
    }

    public function store(Request $request){
        $user = new User();
        $user->first_name = $request->first_name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();
        $message = "User created";
        return redirect('/home')->with(compact('message'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/home')->with(['successMessage' => 'Account deleted successfully']);
    }

    public function delete($id){
        $user = User::find($id);
        $attr = \App\Attribute::all();
        return view('user.delete')->with(compact('user', 'attr'));
    }
}

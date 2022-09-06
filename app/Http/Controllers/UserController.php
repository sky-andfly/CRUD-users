<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user){
        $all_users = $user->all();
        return view('user.index', ['all_users' => $all_users]);
    }
    public function show_add_user_form(){
        return view('user.add');
    }
    public function store_user(Request $request){
        $data = $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required', 'unique:users'],
            'image' => ['nullable', 'image'],
            'password' => ['required', 'confirmed', 'min:3'],
            'number_phone' => ['required', 'string'],
            'data_birthday' => ['required', 'date'],

        ]);
        $avatar = $request->file('image');
        if($avatar == null){
            $file_name = 'base_avatar.png';
        }else{

            $file_name =  $avatar->store('upload');
        }
        $data['image'] = 'image/' . $file_name;

        User::create($data);
        return to_route('users.index');
    }
    public function show(User $user){
        return view('user.show', ['user' => $user]);
    }

    public function show_edit_form(User $user){
        return view('user.edit', ['user' => $user]);
    }
    public function update(User $user, Request $request){
        $data = $request->validate([
            'name' => ['string', 'nullable'],
            'email' => ['email', 'nullable'],
            'image' => ['nullable', 'image'],
            'password' => ['nullable', 'confirmed', 'min:3'],
            'number_phone' => ['nullable', 'string'],
            'data_birthday' => ['nullable', 'date'],

        ]);
        $avatar = $request->file('image');
        if ($request->input('password') == null){
            unset($data['password']);
        }
        if($avatar == null){
           unset($data['image']);
        }else{
            Storage::delete($user->image);
            $file_name =  $avatar->store('upload');
            $data['image'] = 'image/' . $file_name;
        }

        $user->update($data);
        return to_route('users.show', $user->id);
    }
    public function destroy(User $user){
        $user->delete();
        return to_route('users.index');
    }
}

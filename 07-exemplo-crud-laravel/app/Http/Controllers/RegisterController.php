<?php

namespace App\Http\Controllers;

use App\Models\UserController;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function save(Request $request) {
        UserController::insert([
            'name' => $request->input('name'),
            'last' => $request->input('last'),
        ]);

        return view('register');
    }

    public function list() {
        $list = UserController::select([
            'id',
            'name',
            'last'
        ])->get();

        return view('list', ['list' => $list]);
    }

    public function edit(Request $request, $id) {
        $user = UserController::find($id);
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request) {

        $user = UserController::find($request->input('id'));
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->save();

        return redirect('/edit/'.$user->id);
    }

    public function delete(int $id) {
        $user = UserController::find($id);
        $user->delete();
        return redirect('/list');
    }
 }

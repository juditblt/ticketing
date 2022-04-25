<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /*
    private  $users = [
        ['id' =>1, 'name' =>'Anna', 'gender' =>'female'],
        ['id' =>2, 'name' =>'Peti', 'gender' =>'male']
    ];
    */
    public function index(){
        /*
        $messages = array();
        $messages[] = ['text' =>'Nem működik az oldal!', 'danger'];
        $messages[] = ['text' =>'De közeledünk hozzá!', 'info'];
        */
        Log::debug('users.index page loaded');
        return view('users.index', [
            /*
            'users' =>$this->users,
            'messages' =>$messages
            */
            'users' => User::all()
        ]);
    }

    public function show(Request $request, $id){   // korábban a paraméter: userid
        /*
        foreach ($this->users as $user){
            if ($user['id'] == $userid){
                return view('users.show', [
                    'user' =>$user
                ]);
            }
        }
        abort(404);
        */
        Log::debug('users.show page loaded');
        $user = User::find($id);
        if ($user == null){
            Log::warning('user.show on not available user (id=' . $id . ')');
            Log::channel('bot')->warning('user.show error = ' . $id);
            $request->session()->flash('alert-warning', 'A felhasználó nem található!');
            return redirect()->back();
        }
        return view('users.show', [
            'user' =>$user
        ]);
    }
}

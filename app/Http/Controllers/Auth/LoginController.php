<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request) {

        if($request->tryToLogin()) {
            return to_route('dashboard');
        }

        return back()->with(['message' => 'Não encontrado!']);
    }
}

// public function destroy($id)
// {
//     $task = Task::where('user_id', Auth::id())->findOrFail($id);
//     $task->delete();

//     return redirect('/tasks');
// }   

// public function store(Request $request)
//     {
//         $request->validate([
//             'task' => 'required|string|max:255',
//         ]);

//         Auth::user()->tasks()->create([
//             'task' => $request->task,
//             'completed' => false,
//         ]);     

//         return redirect('/tasks');
//     }
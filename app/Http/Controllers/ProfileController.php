<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        if($file = $request->photo) {
            $data['photo'] = $file->store('photos');
        }


        $user->update($data);

        return back()->with('message', 'Profile atualizado com sucesso!');
    }
}

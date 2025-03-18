<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MakeLoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'], 
            'password' => ['required'],
        ];
    }

    public function tryToLogin(): bool {

        $user = User::where('email', $this->email)->first();

        if($user){
            if(Hash::check($this->password, $user->password)) {
                Auth::login($user); 
                return true;
            }
        }

        return false;
    }
}
